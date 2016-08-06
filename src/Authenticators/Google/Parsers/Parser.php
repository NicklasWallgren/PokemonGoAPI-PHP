<?php

namespace NicklasW\PkmGoApi\Authenticators\Google\Parsers;

use NicklasW\PkmGoApi\Authenticators\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Authenticators\Exceptions\ServerResponseException;
use NicklasW\PkmGoApi\Authenticators\Google\Parsers\Results\Result;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

abstract class Parser {

    /**
     * @var integer The success status response code
     */
    protected static $RESPONSE_STATUS_SUCCESS = 200;

    /**
     * @var integer The redirect status response code
     */
    protected static $RESPONSE_STATUS_REDIRECT = 302;

    /**
     * @var integer The forbidden status response code
     */
    protected static $RESPONSE_STATUS_FORBIDDEN = 403;

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
     * @param string $content
     * @return Result
     */
    abstract public function parse($content);

    /**
     * Validate the request response.
     *
     * @param ResponseInterface $response
     * @throws ResponseException
     */
    protected function validateResponse($response)
    {
        Log::debug(sprintf('[#%s] Validating response. Status code: \'%s\'', __CLASS__, $response->getStatusCode()));

        // Check if the response corresponds to a server error
        if (!$this->isServerError($response)) {
            return;
        }

        Log::debug(sprintf('[#%s] Retrieved a invalid response. Content: \'%s\'', __CLASS__, $response->getBody()));

        throw new ResponseException(
            sprintf('Retrieved a invalid response. Response: \'%s\'', (string)$response->getBody()));
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

        return $responseCode === 5;
    }


}