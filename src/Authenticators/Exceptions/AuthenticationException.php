<?php


namespace NicklasW\PkmGoApi\Authenticators\Exceptions;

use \Exception;

class AuthenticationException extends Exception {

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

}