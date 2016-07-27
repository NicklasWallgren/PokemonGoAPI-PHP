<?php

namespace NicklasW\PkmGoApi\Authenticators\PTC\Parsers;

use NicklasW\PkmGoApi\Authenticators\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\AuthenticationInformationResult;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class AuthenticationInformationParser extends Parser {

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
     * @throws ResponseException
     */
    public function parse($response)
    {
        // Validate the retrieved response
        $this->validateResponse($response);

        // Decode the content
        $content = $this->content($response->getBody()->getContents());

        return new AuthenticationInformationResult(array('lt' => $content->lt, 'execution' => $content->execution));
    }

    /**
     * Returns the content.
     *
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function content($response)
    {
        return json_decode($response);
    }

}