<?php


namespace NicklasW\PkmGoApi\Providers;

use NicklasW\PkmGoApi\Authenticators\Factory as AuthenticatorFactory;
use NicklasW\PkmGoApi\Authenticators\Managers\AuthenticationManager;
use NicklasW\PkmGoApi\Authenticators\Managers\Manager;
use NicklasW\PkmGoApi\Facades\Log;
use NicklasW\PkmGoApi\Handlers\RequestHandler;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use NicklasW\PkmGoApi\Requests\Envelops\Factory as EnvelopeFactory;

class RequestHandlerServiceProvider extends ServiceProvider {

    /**
     * @var EnvelopeFactory
     */
    protected $envelopeFactory;

    /**
     * @var AuthenticatorFactory
     */
    protected $authenticatorFactory;

    /**
     * RequestHandlerServiceProvider constructor.
     *
     * @param ApplicationKernel $app
     */
    public function __construct($app)
    {
        // Initialize the envelope factory
        $this->envelopeFactory = new EnvelopeFactory();

        // Initial the authenticator factory
        $this->authenticatorFactory = new AuthenticatorFactory();

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
        $this->app->container()->set('RequestHandler', new RequestHandler($this->authenticate(), $this->app));
    }

    /**
     * Authenticate the user.
     *
     * @return RequestEnvelope_AuthInfo
     */
    protected function authenticate()
    {
        Log::debug(sprintf('Authenticates user.'));
        
        // Get access token, dispatch to listeners

        return $this->envelopeFactory->create(EnvelopeFactory::$TYPE_AUTHINFO,
            $this->getAuthenticationManager()->getIdentifier(),
            $this->getAuthenticationManager()->getAccessToken()
        );
    }

    /**
     * Returns the authentication manager.
     *
     * @return AuthenticationManager
     */
    protected function getAuthenticationManager()
    {
        return $this->app->getManager();
    }

}