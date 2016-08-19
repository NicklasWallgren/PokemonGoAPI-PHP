<?php

namespace NicklasW\PkmGoApi\Kernels;

use DI\NotFoundException;
use NicklasW\PkmGoApi\Api\PokemonGoApi;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Providers\PokemonGoApiServiceProvider;
use NicklasW\PkmGoApi\Providers\RequestHandlerServiceProvider;

class ApplicationKernel extends Kernel {

    /**
     * @var double
     */
    protected $latitude = 0;

    /**
     * @var double
     */
    protected $longitude = 0;

    /**
     * Kernel constructor.
     *
     * @param AuthenticationManager $manager
     * @param string|null $environmentFilePath
     */
    public function __construct($manager, $environmentFilePath = null)
    {
        parent::__construct($manager, $environmentFilePath);

    }

    /**
     * Initializes the library.
     */
    public function initialize()
    {
        // Add the application object to the container
        $this->container->set('app', $this);

        // Add the defined service providers
        $this->addServiceProviders();

        parent::initialize();
    }

    /**
     * Returns the pokemon go api.
     *
     * @return PokemonGoApi
     * @throws NotFoundException
     */
    public function getPokemonGoApi()
    {
        return $this->container->get('PokemonGoApi');
    }

    /**
     * Sets the location.
     *
     * @param double $latitude
     * @param double $longitude
     */
    public function setLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return Manager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Add the facades classes.
     */
    protected function addFacades()
    {
        $this->proxyManager->addProxy('App', 'NicklasW\PkmGoApi\Facades\App');

        parent::addFacades();
    }

    /**
     * Add the service providers classes.
     */
    protected function addServiceProviders()
    {
        // Add the pokemon go api service provider
        $this->register(new PokemonGoApiServiceProvider($this));

        // Add the request handler service provider
        $this->register(new RequestHandlerServiceProvider($this));
    }

}
