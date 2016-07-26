<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationInformationResult;
use PHPHtmlParser\Dom;

class AuthenticationInformationParser extends Parser {

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
     * The method which parses the page.
     *
     * @param string $content
     * @return AuthenticationInformationResult
     */
    public function parse($content)
    {
        // Initialize parser with the content
        $this->dom->loadStr($content, array());

        return new AuthenticationInformationResult(
            array('galx' => $this->getGalx(), 'gxf' => $this->getGXF(), 'continue' => $this->getContinue()));
    }

    /**
     * Returns the GALX id.
     *
     * @return mixed
     */
    protected function getGalx()
    {
        // Retrieve the HTML Node
        $result = $this->dom->find('input[name=GALX]', 0);

        return $result->getAttribute('value');
    }

    /**
     * Returns the GXF id.
     *
     * @return mixed
     */
    protected function getGXF()
    {
        // Retrieve the HTML Node
        $result = $this->dom->find('input[name=gxf]', 0);

        return $result->getAttribute('value');
    }

    /**
     * Returns the Continue id.
     *
     * @return mixed
     */
    protected function getContinue()
    {
        // Retrieve the HTML Node
        $result = $this->dom->find('input[name=continue]', 0);

        return $result->getAttribute('value');
    }

}