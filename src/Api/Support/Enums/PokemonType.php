<?php

namespace NicklasW\PkmGoApi\Api\Support\Enums;

class PokemonType extends AbstractEnum
{

    /**
     * @var string The enum class
     */
    protected static $class = \POGOProtos\Enums\PokemonType::class;

    /**
     * @var array List of cached entries and corresponding name.
     */
    protected static $CACHED_ENTRIES;

}