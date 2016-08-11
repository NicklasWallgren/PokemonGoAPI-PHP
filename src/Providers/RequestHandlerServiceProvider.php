<?php

namespace NicklasW\PkmGoApi\Providers;

use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Facades\Log;
use NicklasW\PkmGoApi\Handlers\RequestHandler;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use NicklasW\PkmGoApi\Requests\Envelops\Factory as EnvelopeFactory;

class RequestHandlerServiceProvider extends ServiceProvider {

    /**
     * RequestHandlerServiceProvider constructor.
     *
     * @param ApplicationKernel $app
     */
    public function __construct($app)
    {
        parent::__construct($app);
    }

    /**
     * Register the service provider.
     *
     * @return mixed
     */
    public function register()
    {
        // Create the RequestHandler instance
        $this->app->container()->set('RequestHandler', new RequestHandler($this->app));
    }

    /**
     * Authenticate the user.
     *
     * @return RequestEnvelope_AuthInfo
     */
    protected function authenticate()
    {
        Log::debug(sprintf('Authenticates user.'));

        // Retrieve the authentication manager
        $manager = $this->getAuthenticationManager();

        // Retrieve the access token
        $accessToken = $manager->getAccessToken();

        return $this->envelopeFactory->create(
            EnvelopeFactory::$TYPE_AUTHINFO, $manager->getIdentifier(), $accessToken);
    }

    /**
     * Returns the authentication manager.
     *
     * @return Manager
     */
    protected function getAuthenticationManager()
    {
        return $this->app->getManager();
    }

}