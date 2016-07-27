<?php

namespace NicklasW\PkmGoApi\Authenticators\PTC\Parsers;

use NicklasW\PkmGoApi\Authenticators\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Authenticators\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\TicketResult;
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

        // Parse the content
        $content = $this->parseContent($response);

        // Check if the response includes any error messages
        if (array_key_exists('errors', $content)) {
            // Retrieve the error messages
            $errors = $content['errors'];

            // Check if there are any available error messages
            if (sizeof($errors) > 0) {
                throw new AuthenticationException(current($errors));
            }
        }

        // Retrieves the location header
        $location = current($response->getHeader('Location'));

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
        // Decode the response body
        $content = json_decode($response->getBody()->getContents(), true);

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