<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Parsers;

use NicklasW\PkmGoApi\Authentication\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Parsers\Results\TicketResult;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class TicketParser extends Parser {

    /**
     * Authenticate constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The method which parses the content.
     *
     * @param ResponseInterface $response
     * @return AuthenticationInformationResult
     * @throws AuthenticationException
     * @throws ResponseException
     */
    public function parse($response)
    {
        // Validate the retrieved response
        $this->validateResponse($response);

        Log::debug(sprintf('[#%s] Retrieved content: \'%s\'', __CLASS__, $response->getBody()));

        // Parse the content
        $content = $this->parseContent($response);

        // Check if the response includes any error messages
        if (array_key_exists('errors', $content)) {
            // Retrieve the error messages
            $errors = $content['errors'];

            // Check if there are any available error messages
            if (sizeof($errors) > 0) {
                Log::debug(sprintf('[#%s] Error messages in response. Errors: \'%s\'', __CLASS__,
                    print_r($errors, true)));
                // A code of 503 indicates a service unavailable or unexpected error response. 0 is default
                $code = (strstr(implode($errors),"unexpected error")) ? AuthenticationException::AUTH_SERVER_ERROR : 0;
                throw new AuthenticationException(current($errors),$code);
            }
        }

        // Retrieves the location header
        $location = current($response->getHeader('Location'));

        Log::debug(sprintf('[#%s] Retrieved location header: \'%s\'', __CLASS__, $location));

        return new TicketResult(array('ticket' => $this->parseTicket($location)));
    }

    /**
     * Returns the parsed content.
     *
     * @param ResponseInterface $response
     * @return array
     */
    protected function parseContent($response)
    {
        // Retrieve the content
        $content = (string)$response->getBody();

        // Decode the response body
        $content = json_decode($content, true);

        // Check if the response body is null
        if ($content === null) {
            return array();
        }

        return $content;
    }

    /**
     * Returns the parsed ticket.
     *
     * @param string $location
     * @return string mixed
     */
    protected function parseTicket($location)
    {
        return substr($location, strpos($location, '=') + 1);
    }

}