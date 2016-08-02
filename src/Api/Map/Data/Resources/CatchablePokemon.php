<?php


namespace NicklasW\PkmGoApi\Api\Map\Data\Resources;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Enums\PokemonId;

class CatchablePokemon extends Data {

    /**
     * @var string
     */
    protected $spawnPointId = "";

    /**
     * @var int
     */
    protected $encounterId = 0;

    /**
     * @var
     */
    protected $pokemonId = PokemonId::MISSINGNO;

    /**
     * @var int
     */
    protected $expirationTimestampMs = 0;

    /**
     * @var double
     */
    protected $latitude = 0;

    /**
     * @var double
     */
    protected $longitude = 0;

}