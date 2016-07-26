<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AccountInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationCodeResult;
use PHPHtmlParser\Dom;

class AuthenticationCodeParser extends Parser {

    /**
     * Authenticate constructor.
     *
     * @param Dom $dom
     */
    public function __construct(Dom $dom)
    {
        parent::__construct($dom);
    }

    /**
     * The method which parses the content.
     
     * 
*@param string $content
     * @return AuthenticationCodeResult
     */
    public function parse($content)
    {
        // Initialize parser with the content
        $this->dom->loadStr($content, array());

        return new AuthenticationCodeResult(array('code' => $this->getCode()));
    }

    /**
     * Returns the code.
     *
     * @return mixed
     */
    protected function getCode()
    {
        // Retrieve the HTML Node
        $result = $this->dom->find('#code', 0);

        return $result->getAttribute('value');
    }

}