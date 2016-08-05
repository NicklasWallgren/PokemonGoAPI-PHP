<?php


namespace NicklasW\PkmGoApi\Api;

use NicklasW\PkmGoApi\Facades\App;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use NicklasW\PkmGoApi\Services\RequestService;

abstract class Procedure {

    /**
     * Procedure constructor.
     */
    public function __construct()
    {
        $this->setUpTraits();
    }

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

    /**
     * Returns the application.
     *
     * @return ApplicationKernel
     */
    protected function getApplication()
    {
        return App::getInstance();
    }

    /**
     * Set up the traits.
     *
     * @return void
     */
    protected function setUpTraits()
    {

    }

}