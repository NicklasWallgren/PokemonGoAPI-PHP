<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use Exception;
use NicklasW\PkmGoApi\Authenticators\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationConfirmationInformationResult;
use PHPHtmlParser\Dom;

class AuthenticationConfirmationInformationParser extends Parser {

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
     * @return AuthenticationConfirmationInformationResult
     * @throws Exception
     */
    public function parse($content)
    {
        // Initialize parser with the content
        $this->dom->loadStr($content, array());

        // Retrieve possible error from the content
        $error = $this->getError();

        // Check if the content includes any errors
        if ($error !== null) {
            throw new AuthenticationException('Invalid username or password');
        }

        return new AuthenticationConfirmationInformationResult(
            array('approveUrl' => $this->getApproveUrl(), 'stateWrapperId' => $this->getStateWrapperId()));
    }

    /**
     * Returns the approve url.
     *
     * @return mixed
     */
    protected function getApproveUrl()
    {
        // Retrieve the HTML Node
        $result = $this->dom->find('#connect-approve', 0);

        return $result->getAttribute('action');
    }


    /**
     * Returns the state wrapper id.
     *
     * @return mixed
     */
    protected function getStateWrapperId()
    {
        // Retrieve the HTML Node
        $result = $this->dom->find('#state_wrapper', 0);

        return $result->getAttribute('value');
    }

    /**
     * Returns the error message.
     */
    protected function getError()
    {
        // Retrieve the HTML Node
        $errorHtmlNode = $this->dom->find('.error-msg', 0);

        // Check if we retrieved a valid html node
        if ($errorHtmlNode == null) {
            return null;
        }

        return $errorHtmlNode->innerHtml();
    }

}