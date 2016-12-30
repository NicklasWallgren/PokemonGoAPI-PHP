<?php

namespace NicklasW\PkmGoApi\Services;

use DI\Container;
use NicklasW\PkmGoApi\Facades\App;
use NicklasW\PkmGoApi\Handlers\RequestHandler;

class RequestService {

    /**
     * Returns the request handler.
     *
     * @return RequestHandler
     * @throws \DI\NotFoundException
     */
    public function requestHandler()
    {
        return $this->getContainer()->get('RequestHandler');
    }

    /**
     * Returns the container.
     *
     * @return Container
     */
    protected function getContainer()
    {
        return App::container();
    }

}