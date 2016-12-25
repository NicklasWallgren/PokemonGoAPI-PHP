<?php

namespace NicklasW\PkmGoApi\Api\Support;

use ReflectionClass;

abstract class AbstractEnum
{

    /**
     * @var array List of cached pokemon ids and corresponding name.
     */
    protected static $POKEMON_IDS;

    /**
     * @var string The enum class
     */
    protected static $class;

    /**
     * Returns the enum name.
     *
     * @param int $id The enum id
     * @return string|null
     */
    public static function name($id)
    {
        // Retrieve the list of enum ids
        $enum = self::getCachedEnumEntries();

        // Check if we retrieved a valid enu id
        if (array_key_exists($id, $enum)) {
            return $enum[$id];
        }

        return null;
    }

    /**
     * Returns true if valid, false otherwise.
     *
     * @param int $id The enum id
     * @return bool
     */
    public static function isValid($id)
    {
        // Retrieve the list of enum ids
        $pokemon = self::getCachedEnumEntries();

        return array_key_exists($id, $pokemon);
    }


    /**
     * Returns defined enum ids.
     *
     * @return array
     */
    protected static function getCachedEnumEntries()
    {
        // Check if the pokemon ids has been cached since earlier
        if (self::$POKEMON_IDS == null) {
            $reflectClass = new ReflectionClass(static::$class);
            self::$POKEMON_IDS = array_flip($reflectClass->getConstants());

        }

        return self::$POKEMON_IDS;
    }

}