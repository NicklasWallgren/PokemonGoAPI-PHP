<?php

namespace NicklasW\PkmGoApi\Kernels;

use DI\NotFoundException;
use GuzzleHttp\Client;
use NicklasW\PkmGoApi\Api\Data\Location;
use NicklasW\PkmGoApi\Api\PokemonGoApi;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Clients\Proxies\ClientProxy;
use NicklasW\PkmGoApi\Providers\PokemonGoApiServiceProvider;
use NicklasW\PkmGoApi\Providers\RequestHandlerServiceProvider;

class ApplicationKernel extends Kernel
{

    /**
     * @var AuthenticationManager
     */
    protected $manager;

    /**
     * @var Location
     */
    protected $location;

    /**
     * Kernel constructor.
     *
     * @param AuthenticationManager $manager
     */
    public function __construct($manager)
    {
        $this->manager = $manager;
        $this->location = new Location();

        // Add the defined service providers
        $this->addServiceProviders();

        parent::__construct();
    }

    /**
     * Initializes the library.
     */
    public function initialize()
    {
        parent::initialize();

        // Initialize the client
        $this->initializeClient();

        // Add the application object to the container
        $this->container->set('app', $this);
    }

    /**
     * Sets the HTTP client.
     *
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->container()->set('client', new ClientProxy($client));
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
     * @param Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return Manager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Initialize client.
     */
    public function initializeClient()
    {
        $this->container->set('client', new ClientProxy(new Client()));
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
