<?php


namespace NicklasW\PkmGoApi\Api;

use NicklasW\PkmGoApi\Services\RequestService;

abstract class Procedure {

    /**
     * Returns the request service.
     *
     * @return RequestService
     */
    protected function getRequestService()
    {
        return $this->getPokemonGoApi()->getRequestService();
    }

    /**
     * Returns the pokemon go api.
     *
     * @return PokemonGoApi
     */
    protected function getPokemonGoApi()
    {
        return App::getPokemonGoApi();
    }

}