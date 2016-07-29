<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationTokenResult;
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

        return new AuthenticationTokenResult(array('auth' => $this->parseAuthId($content)));
    }

    /**
     * Returns the parsed auth id.
     *
     * @param string $content
     * @return string mixed
     */
    protected function parseAuthId($content)
    {
        $matches = array();

        preg_match('/Auth=(?<token>.*)/', $content, $matches);

        return $matches['token'];
    }


}