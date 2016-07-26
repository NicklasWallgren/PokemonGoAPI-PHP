<?php

namespace NicklasW\PkmGoApi\Api\Map;

use Exception;
use NicklasW\PkmGoApi\Api\Procedure;

class Map extends Procedure {

    /**
     * Returns the map objects.
     */
    public function getObjects()
    {
        throw new Exception('To be implemented');
    }

    /**
     * Returns the catchable pokemons located on the map.
     */
    public function getCatchablePokemons()
    {
        throw new Exception('To be implemented');
    }

}