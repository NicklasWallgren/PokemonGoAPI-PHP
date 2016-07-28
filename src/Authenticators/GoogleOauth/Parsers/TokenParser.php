<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationTokenResult;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class TokenParser extends Parser {

    /**
     * TokenParser constructor.
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
        $content = $response->getBody()->getContents();

        return new AuthenticationTokenResult(array('token' => $this->parseToken($content)));
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

        preg_match('/Token=(?<token>.*)/', $content, $matches);

        return $matches['token'];
    }

}