<?php

namespace NicklasW\PkmGoApi\Api\Support\Enums;

use ReflectionClass;

class GenericEnum
{

    /**
     * @var array List of cached entries and corresponding name.
     */
    protected static $CACHED_ENTRIES = array();

    /**
     * Returns the enum name.
     *
     * @param string $class The enum class
     * @param int    $id    The enum id
     * @return null|string
     */
    public static function name($class, $id)
    {
        // Retrieve the list of enum ids
        $enum = self::getCachedEnumEntries($class);

        var_dump($enum);


        // Check if we retrieved a valid enu id
        if (array_key_exists($id, $enum)) {
            return $enum[$id];
        }

        return null;
    }

    /**
     * Returns true if valid, false otherwise.
     *
     * @param int $class The enum class
     * @param int $id    The enum id
     * @return bool
     */
    public static function isValid($class, $id)
    {
        // Retrieve the list of enum ids
        $pokemon = self::getCachedEnumEntries($class);

        return array_key_exists($id, $pokemon);
    }

    /**
     * Returns defined enum ids.
     *
     * @param string $class The enum class
     * @return array
     */
    protected static function getCachedEnumEntries($class)
    {
        // Check whether the enum class is cached since earlier
        if (!array_key_exists($class, self::$CACHED_ENTRIES)) {
            $reflectClass = new ReflectionClass($class);
            self::$CACHED_ENTRIES[$class] = array_flip($reflectClass->getConstants());
        }

        return self::$CACHED_ENTRIES[$class];
    }

}