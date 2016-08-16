<?php

namespace NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions;

use Exception;

class UnsupportedPlatformException extends \Exception {

    /**
     * UnsupportedPlatformException constructor.
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
