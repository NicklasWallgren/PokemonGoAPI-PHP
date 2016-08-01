<?php

namespace NicklasW\PkmGoApi\Api\Map\Data;

use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\Fort;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\SpawnPoint;
use POGOProtos\Map\Fort\FortData;
use POGOProtos\Map\Fort\FortType;
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
     * @var
     */
    protected $spawnPoints = array();

    /**
     * @var
     */
    protected $catchablePokemons;

    /**
     * @var
     */
    protected $wildPokemons;

    /**
     * @var
     */
    protected $nearbyPokemons;

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
                    $this->pokestops[] = $instance;

                    break;
                case FortType::GYM:
                    // Add the fort to the list of pokestop
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
     *
     */
    public function addCatchablePokemons()
    {

    }

    /**
     *
     */
    public function addWildPokemons()
    {


    }

    /**
     *
     */
    public function addNearbyPokemons()
    {

    }


}