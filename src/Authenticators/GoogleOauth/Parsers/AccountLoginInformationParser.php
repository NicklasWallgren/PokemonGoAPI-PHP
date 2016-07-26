<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AccountInformationResult;
use PHPHtmlParser\Dom;

class AccountLoginInformationParser extends Parser {

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
     * @param string $content
     * @return AccountInformationResult
     */
    public function parse($content)
    {
        // Initialize parser with the content
        $this->dom->loadStr($content, array());

        return new AccountInformationResult(array('profileId' => $this->getProfileId(), 'gxf' => $this->getGXF()));
    }

    /**
     * Returns the Profile id.
     *
     * @return mixed
     */
    protected function getProfileId()
    {
        // Retrieve the HTML Node
        $result = $this->dom->find('input[id=profile-information]', 0);

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


}