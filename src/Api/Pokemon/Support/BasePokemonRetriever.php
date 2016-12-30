<?php

namespace NicklasW\PkmGoApi\Api\Pokemon\Support;

use NicklasW\PkmGoApi\Api\Support\Enums\PokemonFamilyId;

class BasePokemonRetriever
{

    /**
     * Returns the pokemon family id.
     *
     * @param integer $pokemonId
     * @return integer
     */
    public static function getPokemonFamilyId($pokemonId)
    {
        // Check if the pokemon id is a valid pokemon family id
        if (!PokemonFamilyId::isValid($pokemonId)) {
            return self::getPokemonFamilyId(--$pokemonId);
        }

        return $pokemonId;
    }

}