<?php

namespace NicklasW\PkmGoApi\Api\Pokemon;

use Exception;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokeBank;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokemonItem;
use NicklasW\PkmGoApi\Api\Player\Inventory;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\PokemonRequestService;
use POGOProtos\Networking\Responses\EvolvePokemonResponse_Result;
use POGOProtos\Networking\Responses\NicknamePokemonResponse_Result;
use POGOProtos\Networking\Responses\ReleasePokemonResponse_Result;

class Pokemon extends Procedure {

    /**
     * @var PokemonItem
     */
    protected $pokemonData;

    /**
     * Pokemon constructor.
     *
     * @param array $pokemonData
     */
    public function __construct($pokemonData)
    {
        $this->pokemonData = $pokemonData;
    }

    /**
     * Returns the pokemon data.
     *
     * @return PokemonItem
     */
    public function getPokemonData()
    {
        return $this->pokemonData;
    }

    /**
     * Transfers the pokemon.
     */
    public function transfer()
    {
        // Execute the API request
        $response = $this->getRequestService()->transfer($this->getPokemonData()->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== ReleasePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon transfer. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), ReleasePokemonResponse_Result::toString($response->getResult())));
        }

        // Retrieve the poke bank
        $pokeBank = $this->getPokeBank();

        // Remove the pokemon from the poke bank
        $pokeBank->removePokemon($this);
    }

    /**
     * Renames the pokemon.
     *
     * @param string $name
     * @throws Exception
     */
    public function rename($name)
    {
        // Execute the API request
        $response = $this->getRequestService()->rename($this->getPokemonData()->getId(), $name);

        // Check if the request was successfully executed
        if ($response->getResult() !== NicknamePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon rename. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), NicknamePokemonResponse_Result::toString($response->getResult())));
        }

        // Update the pokemon name
        $this->pokemonData->setNickname($name);
    }

    /**
     * Evolves the pokemon.
     */
    public function evolve()
    {
        // Execute the API request
        $response = $this->getRequestService()->envolve($this->getPokemonData()->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== EvolvePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon evolve. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), EvolvePokemonResponse_Result::toString($response->getResult())));
        }

        // Update the inventory
        $this->getInventory()->update();

    }

    /**
     * Returns the request service.
     *
     * @return PokemonRequestService
     */
    protected function getRequestService()
    {
        return new PokemonRequestService();
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
     * Returns the poke bank.
     *
     * @return PokeBank
     */
    protected function getPokeBank()
    {
        return $this->getPokemonGoApi()->getInventory()->getItems()->getPokeBank();
    }

}