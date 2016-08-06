<?php

namespace NicklasW\PkmGoApi\Authenticators\Contracts;

interface Authenticator {

    /**
     * Authenticate using email and password.
     *
     * @param string $email
     * @param string $password
     * @return string The authentication token
     */
    public function login($email, $password);

    /**
     * Authenticate using token.
     *
     * @param string $token
     * @return string The authentication token
     */
    public function loginByToken($token);

    /**
     * Returns the authentication identifier.
     *
     * @return string
     */
    public function identifier();

}