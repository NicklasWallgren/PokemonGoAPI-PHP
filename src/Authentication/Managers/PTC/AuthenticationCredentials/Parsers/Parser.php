<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Parsers;

use NicklasW\PkmGoApi\Authentication\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

abstract class Parser
{

    /**
     * @var integer The success status response code
     */
    protected static $RESPONSE_STATUS_SUCCESS = 200;

    /**
     * @var integer The redirect status response code
     */
    protected static $RESPONSE_STATUS_REDIRECT = 302;

    /**
     * @var Dom The DOM
     */
    protected $dom;

    /**
     * Parser constructor.
     *
     * @param Dom $dom
     */
    public function __construct($dom = null)
    {
        $this->dom = $dom;
    }

    /**
     * The method which parses the content.
     *
     * @param mixed $content
     * @return Result
     */
    abstract public function parse($content);

    /**
     * @param ResponseInterface $response
     * @throws ResponseException
     */
    protected function validateResponse($response)
    {
        Log::debug(sprintf('[#%s] Validating response. Status code: \'%s\'', __CLASS__, $response->getStatusCode()));

        // Check if we retrieved a valid response status code
        if ($this->isSuccessfulResponse($response) || $this->isRedirect($response)) {
            return;
        }

        Log::debug(sprintf('[#%s] Retrieved a invalid response. Content: \'%s\'', __CLASS__, $response->getBody()));

        throw new ResponseException('Retrieved a invalid response from the server. Please try again later');
    }

    /**
     * Returns true if the response was successful, false otherwise.
     *
     * @param ResponseInterface $response
     * @return bool
     */
    protected function isSuccessfulResponse($response)
    {
        return $response->getStatusCode() === self::$RESPONSE_STATUS_SUCCESS;
    }

    /**
     * Returns true if the response corresponds to a redirect, false otherwise
     *
     * @param ResponseInterface $response
     * @return bool
     */
    protected function isRedirect($response)
    {
        return $response->getStatusCode() === self::$RESPONSE_STATUS_REDIRECT;
    }

}