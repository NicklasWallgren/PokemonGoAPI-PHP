<?php

namespace NicklasW\PkmGoApi\Api\Support\Traits;

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Pokedex;
use NicklasW\PkmGoApi\Api\Player\Inventory;
use NicklasW\PkmGoApi\Api\Player\Profile;
use NicklasW\PkmGoApi\Api\PokemonGoApi;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

trait MakeApiResourcesAvailable {

    /**
     * Returns the poke bank.
     *
     * @return PokeBank
     */
    protected function pokeBank()
    {
        return $this->getPokemonGoApi()->getInventory()->getPokeBank();
    }

    /**
     * Returns the candy bank.
     *
     * @return Pokedex
     */
    protected function pokedex()
    {
        return $this->inventory()->getPokedex();
    }

    /**
     * Returns the candy bank.
     *
     * @return CandyBank
     */
    protected function candyBank()
    {
        return $this->inventory()->getCandyBank();
    }

    /**
     * Returns the candy bank.
     *
     * @return Profile
     */
    protected function profile()
    {
        return $this->getPokemonGoApi()->getProfile();
    }

    /**
     * Returns the inventory.
     *
     * @return Inventory
     */
    protected function inventory()
    {
        return $this->getPokemonGoApi()->getInventory();
    }

    /**
     * Returns the pokemon go api.
     *
     * @return PokemonGoApi
     */
    protected function getPokemonGoApi()
    {
        return App::getPokemonGoApi();
    }

    /**
     * Returns the application.
     *
     * @return ApplicationKernel
     */
    protected function getApplication()
    {
        return App::getInstance();
    }

}