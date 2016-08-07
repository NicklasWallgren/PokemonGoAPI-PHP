<?php

namespace NicklasW\PkmGoApi\Managers\Google\AuthenticationCredentials\Parsers;

use NicklasW\PkmGoApi\Authenticators\Google\AuthenticationCredentials\Parsers\Results\AuthenticationTokenResult;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class OauthTokenParser extends Parser {

    /**
     * OauthTokenParser constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The method which parses the page.
     *
     * @param ResponseInterface $response
     * @return AuthenticationTokenResult
     */
    public function parse($response)
    {
        // Validate the retrieved response
        $this->validateResponse($response);

        // Retrieve the content
        $content = (string)$response->getBody();

        Log::debug(sprintf('[#%s] Retrieved response. Content: \'%s\'', __CLASS__, $content));

        return new AuthenticationTokenResult(
            array('auth' => $this->parseAuthId($content), 'timestamp' => $this->parseExpiryTimestamp($content)));
    }

    /**
     * Returns the parsed auth id.
     *
     * @param string $content
     * @return string
     */
    protected function parseAuthId($content)
    {
        $matches = array();

        preg_match('/Auth=(?<token>.*)/', $content, $matches);

        return $matches['token'];
    }

    /**
     * Returns the expiry timestamp.
     *
     * @param string $content
     * @return string
     */
    protected function parseExpiryTimestamp($content)
    {
        $matches = array();

        preg_match('/Expiry=(?<expiry>.*)/', $content, $matches);

        return $matches['expiry'];
    }

}