<?php

namespace NicklasW\PkmGoApi\Handlers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as HttpRequest;
use NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Requests\Request;
use POGOProtos\Networking\Envelopes\RequestEnvelope;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Request as NetworkRequest;
use Psr\Http\Message\ResponseInterface;

class RequestHandler {

    /**
     * @var string The API URL
     */
    protected static $API_URL = 'https://pgorelease.nianticlabs.com/plfe/rpc';

    /**
     * @var int The request code
     */
    protected static $REQUEST_STATUS_CODE = 2;

    /**
     * @var int The request id
     */
    protected static $REQUEST_ID = 8145806132888207460;

    /**
     * @var string Authentication error response status
     */
    protected static $RESPONSE_STATUS_AUTHENTICATION_ERROR = 102;

    /**
     * @var string The handskake response status
     */
    protected static $RESPONSE_STATUS_HANDSHAKE = 53;

    /**
     * @var string The unknown response status
     */
    protected static $RESPONSE_STATUS_UNKNOWN = 52;

    /**
     * @var Request[] The list of requests to be handled
     */
    protected $requests;

    /**
     * @var Session
     */
    protected $session;

    /**
     * RequestHandler constructor.
     *
     * @param RequestEnvelope_AuthInfo $authenticationInformation
     */
    public function __construct($authenticationInformation)
    {
        $this->session = new Session();
        $this->session->setAuthenticationInformation($authenticationInformation);
    }

    /**
     * Handles a request.
     *
     * @param Request $request
     * @throws Exception
     */
    public function handle($request)
    {
        // Build and populate request envelope
        $requestEnvelope = $this->build($request);

        // Execute the HTTP request
        $response = $this->call($requestEnvelope);

        // Check authentication status
        if ($this->hasAuthenticationError($response)) {
            throw new AuthenticationException('Invalid authentication token provided');
        }

        // Initialize session
        $this->session($response);

        // Check if the request corresponds to a handshake
        if ($this->isHandshake($response)) {
            $this->handle($request);

            return;
        }

        // Check if the request corresponds to a unknown response
        if ($this->isUnknownResponse($response)) {
            throw new Exception(sprintf('Retrieved a unknown status code %s', $response->getStatusCode()));
        }

        // Handles and unsmarshalles the response envelope
        $request->handleResponse($response);
    }

    /**
     * Builds the server request envelope.
     *
     * @param Request $request
     * @return RequestEnvelope
     */
    protected function build($request)
    {
        // Prepare the network request
        $networkRequest = new NetworkRequest();
        $networkRequest->setRequestType($request->getType());
        $networkRequest->setRequestMessage($request->getMessage()->toProtobuf());

        // Prepare the request envelope
        $requestEnvelope = new RequestEnvelope();
        $requestEnvelope->setStatusCode(self::$REQUEST_STATUS_CODE);
        $requestEnvelope->setRequestId(self::$REQUEST_ID);
        $requestEnvelope->setUnknown12(989);

        // Add request
        $requestEnvelope->addAllRequests(array($networkRequest));

        return $requestEnvelope;
    }

    /**
     * Execute the server request.
     *
     * @param RequestEnvelope $requestEnvelope
     * @return ResponseEnvelope
     */
    protected function call($requestEnvelope)
    {
        // Initialize the HTTP client
        $client = new Client();

        // Set the API URL
        $url = $this->session->getApiUrl();

        // Check if a session is available
        if ($url == null) {
            $url = self::$API_URL;
        }

        // Prepare the authentication
        $this->prepareAuthentication($requestEnvelope);

        // Prepare the HTTP request
        $request = new HttpRequest('POST', $url, array(), $requestEnvelope->toProtobuf());

        // Execute the HTTP request
        return $this->unmarshall($client->send($request));
    }

    /**
     * Unmarshall the response.
     *
     * @param ResponseInterface $response
     * @return ResponseEnvelope
     */
    protected function unmarshall($response)
    {
        // Initialize the response envelope
        $responseEnvelop = new ResponseEnvelope();

        // Unmarshall the response
        $responseEnvelop->read($response->getBody()->getContents());

        return $responseEnvelop;
    }

    /**
     * Handle the session.
     *
     * @param ResponseEnvelope $response
     * @return Session
     */
    protected function session($response)
    {
        // Check if the session is initialized
        if (!$this->session) {
            return new Session();
        }

        // Return if not initial handshake
        if (!$this->isHandshake($response)) {
            return;
        }

        // Set the API URL
        $this->session->setApiUrl(sprintf('https://%s/rpc', $response->getApiUrl()));

        // Set the authentication ticket
        $this->session->setAuthenticationTicket($response->getAuthTicket());
    }

    /**
     * Returns true if the request type corresponds to a authentication error, false otherwise.
     *
     * @param ResponseEnvelope $responseEnvelop
     * @return boolean
     */
    protected function hasAuthenticationError($responseEnvelop)
    {
        return $responseEnvelop->getStatusCode() === self::$RESPONSE_STATUS_AUTHENTICATION_ERROR;
    }

    /**
     * Returns true if request type corresponds to a handshake, false otherwise.
     *
     * @param ResponseEnvelope $responseEnvelop
     * @return boolean
     */
    protected function isHandshake($responseEnvelop)
    {
        return $responseEnvelop->getStatusCode() === self::$RESPONSE_STATUS_HANDSHAKE;
    }

    /**
     * Returns true if the request status code is unknown, false otherwise.
     *
     * @param ResponseEnvelope $responseEnvelop
     * @return boolean
     */
    protected function isUnknownResponse($responseEnvelop)
    {
        return $responseEnvelop->getStatusCode() === self::$RESPONSE_STATUS_UNKNOWN;
    }

    /**
     * Prepares the user authentication.
     *
     * @param RequestEnvelope $requestEnvelope
     */
    protected function prepareAuthentication($requestEnvelope)
    {
        // Check if we retrieved a authentication ticket since earlier
        if ($this->session->getAuthenticationTicket() == null) {
            $requestEnvelope->setAuthInfo($this->session->getAuthenticationInformation());

            return;
        }

        $requestEnvelope->setAuthTicket($this->session->getAuthenticationTicket());
    }

}