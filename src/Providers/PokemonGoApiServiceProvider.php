<?php


namespace NicklasW\PkmGoApi\Providers;

use NicklasW\PkmGoApi\Api\PokemonGoApi;

class PokemonGoApiServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return mixed
     */
    public function register()
    {
        // Create the PokemonGoApi instance
        $this->app->container()->set('PokemonGoApi',
            new PokemonGoApi($this->user(), $this->password(), $this->authenticationType()));
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