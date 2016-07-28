<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use NicklasW\PkmGoApi\Authenticators\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\Result;
use PHPHtmlParser\Dom;

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
     * @var Dom The DOM
     */
    protected $dom;

    /**
     * Parser constructor.
     *
     * @param Dom    $dom
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
     * @param ResponseInterface $response
     * @throws ResponseException
     */
    protected function validateResponse($response)
    {
        // Check if we retrieved a valid response status code
        if ($response->getStatusCode() === self::$RESPONSE_STATUS_SUCCESS ||
            $response->getStatusCode() === self::$RESPONSE_STATUS_REDIRECT) {
            return;
        }

        throw new ResponseException('Retrieved a invalid response from the server. Please try again later');
    }


}