<?php

namespace NicklasW\PkmGoApi\Api\Support\Enums;

use ReflectionClass;

abstract class AbstractEnum
{

    /**
     * @var array List of cached entries and corresponding name.
     */
    protected static $CACHED_ENTRIES;

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
        $enum = static::getCachedEnumEntries();

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
        $pokemon = static::getCachedEnumEntries();

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
        if (static::$CACHED_ENTRIES == null) {
            $reflectClass = new ReflectionClass(static::$class);
            static::$CACHED_ENTRIES = array_flip($reflectClass->getConstants());
        }

        return static::$CACHED_ENTRIES;
    }

}