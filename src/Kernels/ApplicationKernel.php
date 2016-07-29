<?php

namespace NicklasW\PkmGoApi\Kernels;

use DI\NotFoundException;
use NicklasW\PkmGoApi\Api\PokemonGoApi;
use NicklasW\PkmGoApi\Providers\PokemonGoApiServiceProvider;
use NicklasW\PkmGoApi\Providers\RequestHandlerServiceProvider;

class ApplicationKernel extends Kernel {

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var int
     */
    protected $authenticationType;

    /**
     * Kernel constructor.
     *
     * @param string  $user
     * @param string  $password
     * @param integer $authenticationType
     */
    public function __construct($user, $password, $authenticationType)
    {
        $this->user = $user;
        $this->password = $password;
        $this->authenticationType = $authenticationType;

        parent::__construct();
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
     * Returns the user.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Returns the password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the authentication type.
     *
     * @return integer
     */
    public function getAuthenticationType()
    {
        return $this->authenticationType;
    }

    /**
     * Add the facades classes.
     */
    protected function addFacades()
    {
        $this->proxyManager->addProxy('App', 'NicklasW\PkmGoApi\Facades\ApplicationFacade');

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
