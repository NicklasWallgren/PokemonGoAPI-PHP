<?php

namespace NicklasW\PkmGoApi\Api\Support;

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Pokedex;
use NicklasW\PkmGoApi\Api\Player\Inventory;

trait MakeApiResourcesAvailable {

    /**
     * Returns the poke bank.
     *
     * @return PokeBank
     */
    protected function getPokeBank()
    {
        return $this->getPokemonGoApi()->getInventory()->getPokeBank();
    }

    /**
     * Returns the candy bank.
     *
     * @return Pokedex
     */
    protected function getPokedex()
    {
        return $this->getInventory()->getPokedex();
    }

    /**
     * Returns the candy bank.
     *
     * @return CandyBank
     */
    protected function getCandyBank()
    {
        return $this->getInventory()->getCandyBank();
    }

    /**
     * Returns the inventory.
     *
     * @return Inventory
     */
    protected function getInventory()
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