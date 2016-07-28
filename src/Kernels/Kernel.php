<?php

namespace NicklasW\PkmGoApi\Kernels;

use DI\Container;
use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Exception;
use Interop\Container\ContainerInterface;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use NicklasW\PkmGoApi\Config\Config;
use NicklasW\PkmGoApi\Providers\ServiceProvider;
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
     * Kernel constructor.
     */
    public function __construct()
    {
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

        // Initialize the service providers
        $this->initializeServiceProviders();

        // Initialize the logger
        $this->initializeLogger();
    }

    /**
     * Initializes the environment variables.
     */
    protected function loadEnvironmentVariables()
    {
        // Initialize the environment instance
        $dotenv = new Dotenv($this->basePath());

        // Load environment file in given directory.
        $dotenv->load();
    }

    /**
     * Add the facades classes.
     */
    protected function addFacades()
    {
        // Add the Log facade
        $this->proxyManager->addProxy('Log', 'NicklasW\PkmGoApi\Facades\LogFacade');

        // Add the Config facade
        $this->proxyManager->addProxy('Config', 'NicklasW\PkmGoApi\Facades\ConfigFacade');
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
        // Initialize the logger
        $logger = new Logger(self::class);

        // Retrieve the log file path.
        $filePath = $this->getLogFilePath();

        // Check if we retrieved a valid file path
        if ($filePath == null) {
            $logger->pushHandler(new NullHandler(getenv('LOG_LEVEL')));
        } else {
            $logger->pushHandler(new StreamHandler($filePath, getenv('LOG_LEVEL')));
        }

        // Add the logger instance to the container
        $this->container->set('log', $logger);
    }

    /**
     * Returns the log file path.
     *
     * @return string
     * @throws Exception
     */
    protected function getLogFilePath()
    {
        // Retrieve the log file path
        $logFilePath = getenv('LOG_FILE_PATH');

        // Retrieve the directory path
        $directory = dirname($logFilePath);

        // Check if the directory is writable
        if (!is_writeable($directory)) {
            return null;
        }

        return $logFilePath;
    }

}
