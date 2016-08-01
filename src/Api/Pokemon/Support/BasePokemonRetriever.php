<?php


namespace NicklasW\PkmGoApi\Api\Pokemon\Support;

use POGOProtos\Enums\PokemonFamilyId;

class BasePokemonRetriever {

    /**
     * Returns the pokemon family id.
     *
     * @param integer $pokemonId
     * @return integer
     */
    public static function getPokemonFamilyId($pokemonId)
    {
        // Check if valid pokemon family id
        if (!PokemonFamilyId::isValid($pokemonId)) {
            self::getPokemonFamilyId(--$pokemonId);
        }

        return $pokemonId;
    }

}