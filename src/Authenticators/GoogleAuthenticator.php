<?php

namespace NicklasW\PkmGoApi\Authenticators;

use NicklasW\PkmGoApi\Authenticators\Contracts\Authenticator;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AccountInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationConfirmationInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationCodeResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationTokenResult;

class GoogleAuthenticator implements Authenticator {

    /**
     * @var AuthenticationClient
     */
    protected $authenticationClient;

    /**
     * Authenticate using email and password.
     *
     * @param string $email
     * @param string $password
     * @return string The authentication token
     */
    public function login($email, $password)
    {
        // Retrieves the authentication metadata
        $authenticationMetadata = $this->getAuthenticationMetadata();

        // Retrieves the account information metadata
        $accountInformation = $this->getAccountInformationMetadata($authenticationMetadata, $email);

        // Retrieves the authentication confirmation information metadata
        $authenticationConfirmationInformation = $this->getAuthenticationConfirmationInformationMetadata(
            $authenticationMetadata, $accountInformation, $email, $password);

        // Retrieves the authentication code
        $authenticationCode = $this->getAuthenticationCode($authenticationConfirmationInformation);

        // Retrieves the authentication token
        $authenticationToken = $this->getAuthenticationToken($authenticationCode);

        return $authenticationToken->getIdToken();
    }


    /**
     * Returns the authentication identifier.
     *
     * @return string
     */
    public function identifier()
    {
        return 'google';
    }

    /**
     * Returns the authentication metadata.
     *
     * @return AuthenticationInformationResult
     */
    protected function getAuthenticationMetadata()
    {
        return $this->client()->authenticationInformation();
    }

    /**
     * Returns the account information.
     *
     * @param AuthenticationInformationResult $authenticationInformation
     * @param string                          $email
     * @return AccountInformationResult
     */
    protected function getAccountInformationMetadata($authenticationInformation, $email)
    {
        return $this->client()->accountInformation(
            $authenticationInformation->getGalx(),
            $authenticationInformation->getGXF(),
            $authenticationInformation->getContinue(),
            $email
        );
    }

    /**
     * Returns the authentication confirmation information metadata.
     *
     * @param AuthenticationInformationResult $authenticationInformation
     * @param AccountInformationResult        $accountInformation
     * @param string                          $email
     * @param string                          $password
     * @return AuthenticationConfirmationInformationResult
     */
    protected function getAuthenticationConfirmationInformationMetadata($authenticationInformation, $accountInformation, $email, $password)
    {
        return $this->client()->authenticationConfirmationInformation(
            $authenticationInformation->getGalx(),
            $accountInformation->getGXF(),
            $authenticationInformation->getContinue(),
            $accountInformation->getProfileId(),
            $email,
            $password
        );
    }

    /**
     * Returns the authentication code.
     *
     * @param AuthenticationConfirmationInformationResult $authenticationConfirmationInformation
     * @return AuthenticationCodeResult
     */
    protected function getAuthenticationCode($authenticationConfirmationInformation)
    {
        return $this->client()->code(
            $authenticationConfirmationInformation->getStateWrapperId(),
            $authenticationConfirmationInformation->getApproveUrl()
        );
    }

    /**
     * Returns the authentication token.
     *
     * @param AuthenticationCodeResult $authenticationCode
     * @return AuthenticationTokenResult
     */
    protected function getAuthenticationToken($authenticationCode)
    {
        return $this->client()->token($authenticationCode->getCode());
    }

    /**
     * Returns the Authentication client
     *
     * @return AuthenticationClient
     */
    protected function client()
    {
        // Check if the authentication client is initialized
        if ($this->authenticationClient == null) {
            $this->authenticationClient = new AuthenticationClient();
        }

        return $this->authenticationClient;
    }
}