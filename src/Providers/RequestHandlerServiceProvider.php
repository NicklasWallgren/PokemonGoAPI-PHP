<?php


namespace NicklasW\PkmGoApi\Providers;

use NicklasW\PkmGoApi\Facades\Log;
use NicklasW\PkmGoApi\Handlers\RequestHandler;

use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use NicklasW\PkmGoApi\Requests\Envelops\Factory as EnvelopeFactory;

use NicklasW\PkmGoApi\Authenticators\Factory as AuthenticatorFactory;


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
        $this->app->container()->set('RequestHandler',new RequestHandler(
            $this->authenticate($this->authenticationType(), $this->user(), $this->password()), $this->app));
    }

    /**
     * Authenticate the user.
     *
     * @param integer $authType
     * @param string  $user
     * @param string  $password
     * @return RequestEnvelope_AuthInfo|null
     */
    protected function authenticate($authType, $user, $password)
    {
        Log::debug(sprintf('Authentication user. User: \'%s\' Password: \'%s\' Authentication type: \'%s\'',
            $user, $password, $authType));

        // Retrieve the authenticator
        $authenticator = $this->authenticatorFactory->create($authType);

        // Authenticate the user and retrieve the auth token
        $token = $authenticator->login($user, $password);
        
        return $this->envelopeFactory->create(EnvelopeFactory::$TYPE_AUTHINFO, $authenticator->identifier(), $token);
    }

    /**
     * Returns the user.
     *
     * @return string
     */
    protected function user()
    {
        return $this->app->getUser();
    }

    /**
     * Returns the password.
     *
     * @return string
     */
    protected function password()
    {
        return $this->app->getPassword();
    }

    /**
     * Returns the authentication type.
     *
     * @return int
     */
    protected function authenticationType()
    {
        return $this->app->getAuthenticationType();
    }

}