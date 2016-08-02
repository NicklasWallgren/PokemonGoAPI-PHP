<?php

namespace NicklasW\PkmGoApi\Api\Map\Data\Resources;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Enums\PokemonId;

class NearbyPokemon extends Data {

    /**
     * @var
     */
    protected $pokemonId = PokemonId::MISSINGNO;

    /**
     * @var int
     */
    protected $distanceInMeters = 0;

    /**
     * @var int
     */
    protected $encounterId = 0;

}