<?php

namespace NicklasW\PkmGoApi\Handlers;

use POGOProtos\Networking\Envelopes\AuthTicket;
use POGOProtos\Networking\Envelopes\RequestEnvelope_AuthInfo_JWT;

class Session {

    /**
     * @var AuthTicket
     */
    protected $authenticationTicket;

    /**
     * @var RequestEnvelope_AuthInfo_JWT
     */
    protected $authenticationInformation;

    /**
     * @var string The API url
     */
    protected $apiUrl;

    /**
     * Returns true if the session is valid, false otherwise.
     *
     * @return boolean
     */
    public function isValid()
    {
        // Retrieve the authentication ticket instance from the session
        $authenticationTicket = $this->getAuthenticationTicket();

        // Check if we have not authenticated yet
        if ($authenticationTicket === null && $this->getAuthenticationInformation() !== null) {
            return true;
        }

        // Check if the expire timestamp is valid
        if ($authenticationTicket->getExpireTimestampMs() > microtime()) {
            return true;
        }

        return false;
    }

    /**
     * @return AuthTicket
     */
    public function getAuthenticationTicket()
    {
        return $this->authenticationTicket;
    }

    /**
     * @param AuthTicket $authenticationTicket
     */
    public function setAuthenticationTicket($authenticationTicket)
    {
        $this->authenticationTicket = $authenticationTicket;
    }

    /**
     * @return RequestEnvelope_AuthInfo_JWT
     */
    public function getAuthenticationInformation()
    {
        return $this->authenticationInformation;
    }

    /**
     * @param RequestEnvelope_AuthInfo_JWT $authenticationInformation
     */
    public function setAuthenticationInformation($authenticationInformation)
    {
        $this->authenticationInformation = $authenticationInformation;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

}