<?php

namespace NicklasW\PkmGoApi\Handlers;

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