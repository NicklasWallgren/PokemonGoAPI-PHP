<?php

namespace NicklasW\PkmGoApi\Facades;

use XStatic\StaticProxy;

class LogFacade extends StaticProxy {

    /**
     * Retrieves the Instance Identifier that is used to retrieve the Proxy Subject from the Container
     *
     * @return string
     * @throws \BadMethodCallException if the method has not been implemented by a subclass
     */
    public static function getInstanceIdentifier()
    {
        return 'log';
    }

}