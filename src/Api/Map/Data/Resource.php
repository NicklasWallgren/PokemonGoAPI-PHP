<?php

namespace NicklasW\PkmGoApi\Api\Map\Data;

use GetMapObjectsResponse;
use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\CatchablePokemon;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\Fort;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\NearbyPokemon;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\SpawnPoint;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\WildPokemon as WildPokemonData;
use NicklasW\PkmGoApi\Api\Map\Pokestop;
use POGOProtos\Map\Fort\FortData;
use POGOProtos\Map\Fort\FortType;
use POGOProtos\Map\Pokemon\MapPokemon;
use POGOProtos\Map\Pokemon\WildPokemon;
use POGOProtos\Map\SpawnPoint as SpawnPointData;

class Resource extends Data {

    /**
     * @var Fort[]
     */
    protected $pokestops = array();

    /**
     * @var Fort[]
     */
    protected $gyms = array();

    /**
     * @var SpawnPoint[]
     */
    protected $spawnPoints = array();

    /**
     * @var CatchablePokemon[]
     */
    protected $catchablePokemons = array();

    /**
     * @var WildPokemonData[]
     */
    protected $wildPokemons = array();

    /**
     * @var NearbyPokemon[]
     */
    protected $nearbyPokemons = array();

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param GetMapObjectsResponse $data
     * @return static
     */
    public static function create($data)
    {
        $instance = new static();

        // Iterate through the list of map cells
        foreach ($data->getMapCellsArray() as $mapCell) {
            // Add forts to the list of forts
            $instance->addForts($mapCell->getFortsArray());

            // Add spawn points to the list of spawn points
            $instance->addSpawnPoints($mapCell->getSpawnPointsArray());

            // Add catchable pokemons to the list of catchable pokemons
            $instance->addCatchablePokemons($mapCell->getCatchablePokemonsArray());

            // Add wild pokemons to the list of catchable pokemons
            $instance->addCatchablePokemons($mapCell->getWildPokemonsArray());

            // Add wild pokemons to the list of wild pokemons
            $instance->addWildPokemons($mapCell->getWildPokemonsArray());

            // Add nearby pokemons to the list of nearby pokemons
            $instance->addNearbyPokemons($mapCell->getNearbyPokemonsArray());

        }

        return $instance;
    }

    /**
     * Add a new fort.
     *
     * @param FortData[] $forts
     */
    public function addForts($forts)
    {
        foreach ($forts as $fort) {
            // Create the fort instance
            $instance = Fort::create($fort);

            switch ($fort->getType()) {
                case FortType::CHECKPOINT:
                    // Add the fort to the list of pokestop
                    $this->pokestops[] = new Pokestop($instance);

                    break;
                case FortType::GYM:
                    // Add the fort to the list of gym
                    $this->gyms[] = $instance;

                    break;
            }
        }
    }

    /**
     * Adds a spawn point to the list of spawns points.
     *
     * @param SpawnPointData[] $spawnPoints
     */
    public function addSpawnPoints($spawnPoints)
    {
        foreach ($spawnPoints as $spawnPoint) {
            // Add spawn point to the list of spawn points
            $this->spawnPoints[] = SpawnPoint::create($spawnPoint);
        }
    }

    /**
     * Adds catchable pokemon to the list of catchable pokemons.
     *
     * @param MapPokemon $catchablePokemons
     */
    public function addCatchablePokemons($catchablePokemons)
    {
        foreach ($catchablePokemons as $catchablePokemon) {
            $this->catchablePokemons[] = CatchablePokemon::create($catchablePokemon);
        }
    }
    /**
     * Adds catchable pokemon to the list of catchable pokemons.
     *
     * @param WildPokemon $wildPokemons
     */
    public function addWildPokemons($wildPokemons)
    {
        foreach ($wildPokemons as $wildPokemon) {
            $this->wildPokemons[] = WildPokemonData::create($wildPokemon);
        }
    }

    /**
     * Adds nearby pokemon to the list of nearby pokemons.
     *
     * @param MapPokemon $nearbyPokemons
     */
    public function addNearbyPokemons($nearbyPokemons)
    {
        foreach ($nearbyPokemons as $nearbyPokemon) {
            $this->nearbyPokemons[] = NearbyPokemon::create($nearbyPokemon);
        }
    }

}