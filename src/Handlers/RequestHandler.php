<?php

namespace NicklasW\PkmGoApi\Handlers;

use Exception;
use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as HttpRequest;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Facades\Log;
use NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use NicklasW\PkmGoApi\Requests\Envelops\Factory as EnvelopeFactory;
use NicklasW\PkmGoApi\Requests\Request;
use POGOProtos\Networking\Envelopes\RequestEnvelope;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Request as NetworkRequest;
use POGOProtos\Networking\Requests\RequestType;
use Psr\Http\Message\ResponseInterface;

class RequestHandler
{

    /**
     * @var string The API URL
     */
    protected static $API_URL = 'https://pgorelease.nianticlabs.com/plfe/rpc';

    /**
     * @var int The request code
     */
    protected static $REQUEST_STATUS_CODE = 2;

    /**
     * @var string Authentication error response status
     */
    protected static $RESPONSE_STATUS_AUTHENTICATION_ERROR = 102;

    /**
     * @var string Account banned error response status
     */
    protected static $RESPONSE_STATUS_ACCOUNT_BANNED_ERROR = 3;

    /**
     * @var string The handskake response status
     */
    protected static $RESPONSE_STATUS_HANDSHAKE = 53;

    /**
     * @var string The handskake response status
     */
    protected static $RESPONSE_STATUS_THROTTLED = 52;

    /**
     * @var string The unknown response statuses
     */
    protected static $RESPONSE_STATUS_UNKNOWN = array(100);

    /**
     * @var Request[] The list of requests to be handled
     */
    protected $requests;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var integer The request id
     */
    protected $requestId;

    /**
     * @var ApplicationKernel
     */
    protected $application;

    /**
     * @var EnvelopeFactory
     */
    protected $envelopeFactory;

    /**
     * RequestHandler constructor.
     *
     * @param ApplicationKernel $application
     */
    public function __construct($application)
    {
        // Set the initial request id
        $this->requestId = rand(100000000, 999999999);

        // Set the application
        $this->application = $application;

        // Initialize the envelope factory
        $this->envelopeFactory = new EnvelopeFactory();
    }

    /**
     * Handles a request.
     *
     * @param Request $request
     * @param integer $retry
     * @throws AuthenticationException
     * @throws Exception
     */
    public function handle($request, $retry = 0)
    {
        // Validate the session, check if the auth token has expired and renew if possible
        $this->validateSession();

        // Build and populate request envelope
        $requestEnvelope = $this->build($request);

        // Execute the HTTP request
        $response = $this->call($requestEnvelope);

        // Validate the response envelope
        $this->validateResponseEnvelope($response);

        // Initialize session
        $this->session($response);

        // Check if the request corresponds to a handshake
        if ($this->isHandshake($response)) {
            Log::debug(sprintf('Handshake response. Status code: \'%s\'',
                $response->getStatusCode(), print_r($response->getError(), true)));

            $this->handle($request);

            return;
        }

        // Check if the request corresponds to a throttled response
        if ($this->isThrottledResponse($response)) {
            // Check the number of retries, only retry twice
            if ($retry < 2) {
                Log::debug(sprintf('Throttle response. Retrying. Number of retries: \'%s\'', $retry));

                // Only one or two request per second is allowed, sleep one second before retrying
                sleep(1);

                $this->handle($request, ++$retry);

                return;
            }

            throw new Exception(sprintf('The server is to busy. Please try again later', $response->getStatusCode()));
        }

        // Check if the request corresponds to a unknown response
        if ($this->isUnknownResponse($response)) {
            throw new Exception(sprintf('Retrieved a unknown status code %s', $response->getStatusCode()));
        }

        // Handles and unsmarshalles the response envelope
        $request->handleResponse($response);
    }

    /**
     * Validates the response envelope. Throws exception on error.
     *
     * @param ResponseEnvelope $response
     * @throws AuthenticationException
     */
    protected function validateResponseEnvelope($response)
    {
        // Check the authentication status
        if ($this->hasAuthenticationError($response)) {
            Log::debug(sprintf('Authentication error. Status code: \'%s\' Error message: \'%s\'',
                $response->getStatusCode(), print_r($response->getError(), true)));

            throw new AuthenticationException('Invalid authentication token provided');
        }

        // Check the account status
        if ($this->isAccountBannedError($response)) {
            Log::debug(sprintf('Authentication error. Status code: \'%s\' Error message: \'%s\'',
                $response->getStatusCode(), print_r($response->getError(), true)));

            throw new AuthenticationException('Invalid authentication state. The account may be banned');
        }
    }


    /**
     * Re-initialize the session.
     *
     * @param RequestEnvelope_AuthInfo_JWT $authenticationInformation
     */
    protected function reinitializeSession($authenticationInformation)
    {
        $this->session = new Session();

        $this->session->setAuthenticationInformation($authenticationInformation);
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
        $networkRequest->setRequestMessage($request->getMessage()->encode());

        // Prepare the request envelope
        $requestEnvelope = new RequestEnvelope();
        $requestEnvelope->setStatusCode(self::$REQUEST_STATUS_CODE);

        // Sets the request id
        $requestEnvelope->setRequestId($this->requestId());
        $requestEnvelope->setMsSinceLastLocationfix(rand(901, 999));

        // Sets the location
        $requestEnvelope->setLatitude($this->application->getLocation()->getLatitude());
        $requestEnvelope->setLongitude($this->application->getLocation()->getLongitude());
        $requestEnvelope->setAccuracy(rand(30, 100) / 10);

        $repeatedField = new RepeatedField(GPBType::MESSAGE, NetworkRequest::class);
        $repeatedField[] = $networkRequest;

        // Add request
        $requestEnvelope->setRequests($repeatedField);

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
        // Set the API URL
        $url = $this->session->getApiUrl();

        // Check if a session is available
        if ($url == null) {
            $url = self::$API_URL;
        }

        // Prepare the authentication
        $this->prepareAuthentication($requestEnvelope);

        Log::debug(sprintf('The request envelope. Content: \'%s\'', print_r($requestEnvelope, true)));

        // Prepare the HTTP request
        $request = new HttpRequest('POST', $url, array('User-Agent' => 'Niantic App'), $requestEnvelope->encode());

        // Execute the request
        $response = $this->client()->send($request);

        // Validate the retrieved response
        $this->validateResponse($response);

        // Unmarshall the response
        return $this->unmarshall($response);
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
        $responseEnvelop->decode($response->getBody()->getContents());

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
     * Check if the session is valid, if not we refresh if possible.
     */
    protected function validateSession()
    {
        // Check if the current session is valid
        if ($this->session !== null && $this->session->isValid()) {
            return;
        }

        // Retrieve the renewed access token
        $accessToken = $this->manager()->getAccessToken();

        // Build the authentication information
        $authenticationInformation = $this->envelopeFactory->create(
            EnvelopeFactory::$TYPE_AUTHINFO, $accessToken->getProvider(), $accessToken);

        // Reinitialize the session
        $this->reinitializeSession($authenticationInformation);
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
     * Returns true if the request type corresponds to an account banned error, false otherwise.
     *
     * @param ResponseEnvelope $responseEnvelop
     * @return boolean
     */
    protected function isAccountBannedError($responseEnvelop)
    {
        return $responseEnvelop->getStatusCode() === self::$RESPONSE_STATUS_ACCOUNT_BANNED_ERROR;
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
    protected function isThrottledResponse($responseEnvelop)
    {
        return $responseEnvelop->getStatusCode() === self::$RESPONSE_STATUS_THROTTLED;
    }

    /**
     * Returns true if the request status code is unknown, false otherwise.
     *
     * @param ResponseEnvelope $responseEnvelop
     * @return boolean
     */
    protected function isUnknownResponse($responseEnvelop)
    {
        return in_array($responseEnvelop->getStatusCode(), self::$RESPONSE_STATUS_UNKNOWN);
    }

    /**
     * Returns true if the status code corresponds to a server error, false otherwise.
     *
     * @param ResponseInterface $response
     * @return boolean
     */
    protected function isServerError($response)
    {
        // Retrieve the initial integer from the status code
        $responseCode = substr($response->getStatusCode(), 0, 1);

        return $responseCode == 5 || $responseCode == 4;
    }

    /**
     * Returns the request id.
     *
     * @return integer
     */
    protected function requestId()
    {
        return ++$this->requestId;
    }

    /**
     * Validate the request response.
     *
     * @param ResponseInterface $response
     * @throws ResponseException
     */
    protected function validateResponse($response)
    {
        // Check if the response corresponds to a server error
        if (!$this->isServerError($response)) {
            return;
        }

        throw new ResponseException(
            sprintf('Retrieved a invalid response. Response code: \'%s\'', $response->getStatusCode()));
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
            @$requestEnvelope->setAuthInfo($this->session->getAuthenticationInformation());

            return;
        }

        @$requestEnvelope->setAuthTicket($this->session->getAuthenticationTicket());
    }

    /**
     * Returns the authentication manager
     *
     * @return Manager
     */
    protected function manager()
    {
        return $this->application->getManager();
    }

    /**
     * Returns the client.
     *
     * @returns Client
     */
    protected function client()
    {
        return App::get('client');
    }

}