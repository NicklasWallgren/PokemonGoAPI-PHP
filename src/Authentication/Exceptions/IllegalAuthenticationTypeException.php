<?php


namespace NicklasW\PkmGoApi\Authentication\Exceptions;

use \Exception;

class IllegalAuthenticationTypeException extends Exception {

    /**
     * IllegalAuthenticationTypeException constructor.
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