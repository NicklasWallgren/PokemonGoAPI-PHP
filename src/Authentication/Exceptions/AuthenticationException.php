<?php


namespace NicklasW\PkmGoApi\Authentication\Exceptions;

use \Exception;

class AuthenticationException extends Exception {

    const PTC_INVALID_GRANT_ERROR = 498;
    const AUTH_SERVER_ERROR = 503;

    /**
     * AuthenticationException constructor.
     *
     * @param string    $message
     * @param int       $code
     * @param Exception $previous
     */
    public function __construct($message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Determines whether the authentication should be retried.
     * It makes sense to retry if a server-error occured, but not if the credentials are invalid.
     *
     * @return bool
     */
    public function shouldRetry()
    {
        $code = $this->getCode();

        return $code == static::PTC_INVALID_GRANT_ERROR || $code == static::AUTH_SERVER_ERROR;
    }

}