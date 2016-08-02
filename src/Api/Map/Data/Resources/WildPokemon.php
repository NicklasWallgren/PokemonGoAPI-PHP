<?php


namespace NicklasW\PkmGoApi\Api\Map\Data\Resources;

use NicklasW\PkmGoApi\Api\Data\Data;

class WildPokemon extends Data {

    /**
     * @var int
     */
    protected $encounterId = 0; // optional fixed64 encounter_id = 1

    /**
     * @var int
     */
    protected $lastModifiedTimestampMs = 0; // optional int64 last_modified_timestamp_ms = 2

    /**
     * @var int
     */
    protected $latitude = 0; // optional double latitude = 3

    /**
     * @var int
     */
    protected $longitude = 0; // optional double longitude = 4

    /**
     * @var string
     */
    protected $spawnPointId = ""; // optional string spawn_point_id = 5

    /**
     * @var null
     */
    protected $pokemonData = null; // optional .POGOProtos.Data.PokemonData pokemon_data = 7

    /**
     * @var int
     */
    protected $timeTillHiddenMs = 0; // optional int32 time_till_hidden_ms = 11

}