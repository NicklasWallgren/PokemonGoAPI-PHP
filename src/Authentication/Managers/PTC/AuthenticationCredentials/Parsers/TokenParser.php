<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Parsers;

use NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Parsers\Results\TokenResult;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class TokenParser extends Parser {

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
     * @return TokenResult
     */
    public function parse($response)
    {
        // Retrieve the content
        $content = (string)$response->getBody();

        Log::debug(sprintf('[#%s] Retrieved content: \'%s\'', __CLASS__, $content));

        return new TokenResult(
            array('token' => $this->parseToken($content), 'timestamp' => $this->parseExpiresTimestamp($content)));
    }

    /**
     * Returns the parsed ticket.
     *
     * @param string $content
     * @return string mixed
     */
    protected function parseToken($content)
    {
        $matches = array();

        preg_match('/access_token=(?<token>.*)&expires/', $content, $matches);

        return $matches['token'];
    }

    /**
     * Returns the parsed ticket.
     *
     * @param string $content
     * @return string mixed
     */
    protected function parseExpiresTimestamp($content)
    {
        $matches = array();

        preg_match('/expires=(?<expires>.*)/', $content, $matches);

        return time() + intval($matches['expires']);
    }

}