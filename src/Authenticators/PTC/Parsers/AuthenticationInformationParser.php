<?php

namespace NicklasW\PkmGoApi\Authenticators\PTC\Parsers;

use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\AuthenticationInformationResult;
use PHPHtmlParser\Dom;

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
     * @param string $content
     * @return AuthenticationInformationResult
     */
    public function parse($content)
    {
        // Decode the content
        $content = json_decode($content);

        return new AuthenticationInformationResult(array('lt' => $content->lt, 'execution' => $content->execution));
    }

}