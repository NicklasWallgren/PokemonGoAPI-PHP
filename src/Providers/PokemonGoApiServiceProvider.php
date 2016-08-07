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
        $this->app->container()->set('PokemonGoApi', new PokemonGoApi());
    }

}