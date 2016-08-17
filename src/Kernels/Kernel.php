<?php

namespace NicklasW\PkmGoApi\Kernels;

use DI\Container;
use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Exception;
use Interop\Container\ContainerInterface;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use NicklasW\PkmGoApi\Config\Config;
use NicklasW\PkmGoApi\Providers\ServiceProvider;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use XStatic\ProxyManager;

class Kernel implements ContainerInterface {

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var ProxyManager
     */
    protected $proxyManager;

    /**
     * @var ServiceProvider[]
     */
    protected $serviceProviders;

    /**
     * @var
     */
    protected $environmentFilePath;

    /**
     * Kernel constructor.
     *
     * @param string|null $environmentFilePath
     */
    public function __construct($environmentFilePath = null)
    {
        $this->environmentFilePath = $environmentFilePath;

        // Initialize the container
        $this->initializeContainer();

        // Initialize the library
        $this->initialize();
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     * @throws NotFoundException  No entry was found for this identifier.
     * @throws ContainerException Error while retrieving the entry.
     * @return mixed Entry.
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     * @return boolean
     */
    public function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * Register a service provider.
     *
     * @param ServiceProvider $provider
     */
    public function register($provider)
    {
        $this->serviceProviders[] = $provider;
    }

    /**
     * Sets the logger instance.
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->container->set('log', $logger);
    }

    /**
     * Initializes the library.
     */
    protected function initialize()
    {
        // Load the environment variables
        $this->loadEnvironmentVariables();

        // Initialize the configuration
        $this->initializeConfig();

        // Initialize the proxy manager
        $this->initializeProxyManager();

        // Initialize the logger
        $this->initializeLogger();

        // Initialize the service providers
        $this->initializeServiceProviders();
    }

    /**
     * Initializes the environment variables.
     */
    protected function loadEnvironmentVariables()
    {
        // Check if the environment file path is defined
        if ($this->environmentFilePath === null) {
            return;
        }

        // Initialize the environment instance
        $dotenv = new Dotenv($this->environmentFilePath);

        // Load environment file in given directory.
        $dotenv->load();

    }

    /**
     * Add the facades classes.
     */
    protected function addFacades()
    {
        // Add the Log facade
        $this->proxyManager->addProxy('Log', 'NicklasW\PkmGoApi\Facades\Log');

        // Add the Config facade
        $this->proxyManager->addProxy('Config', 'NicklasW\PkmGoApi\Facades\Config');
    }

    /**
     * Initialize the container.
     */
    protected function initializeContainer()
    {
        // Initialize the container builder
        $builder = new ContainerBuilder();

        // Build the container
        $this->container = $builder->build();
    }

    /**
     * Initialize the proxy manager.
     */
    protected function initializeProxyManager()
    {
        // Initialize the proxy manager
        $this->proxyManager = new ProxyManager($this);

        // Add the facades
        $this->addFacades();

        $this->proxyManager->enable(ProxyManager::ROOT_NAMESPACE_ANY);
    }

    /**
     * Returns the container.
     *
     * @return Container
     */
    public function container()
    {
        return $this->container;
    }

    /**
     * Returns the base path.
     *
     * @return string
     */
    public function basePath()
    {
        return __DIR__ . '/../../';
    }

    /**
     * Returns the config path.
     *
     * @return string
     */
    public function configPath()
    {
        return $this->basePath() . 'config';
    }

    /**
     * Initialize the service providers.
     */
    protected function initializeServiceProviders()
    {
        // Iterate through the list of service providers
        foreach ($this->serviceProviders as $serviceProvider) {

            // Register the service provider
            $serviceProvider->register();
        }
    }

    /**
     * Initialize configuration.
     */
    protected function initializeConfig()
    {
        // Initialize the config
        $config = new Config();
        $config->bootstrap($this);

        $this->container->set('config', $config);
    }

    /**
     * Initialize the logger.
     */
    protected function initializeLogger()
    {
        // Add the logger instance to the container
        $this->container->set('log', new NullLogger());
    }

}
