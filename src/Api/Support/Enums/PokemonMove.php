<?php

namespace NicklasW\PkmGoApi\Api\Support\Enums;

class PokemonMove extends AbstractEnum
{

    /**
     * @var string The enum class
     */
    protected static $class = \POGOProtos\Enums\PokemonMove::class;

    /**
     * @var array List of cached entries and corresponding name.
     */
    protected static $CACHED_ENTRIES;

}