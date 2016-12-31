<?php

namespace NicklasW\PkmGoApi\Api\Support\Enums;

class ItemId extends AbstractEnum
{

    /**
     * @var string The enum class
     */
    protected static $class = \POGOProtos\Inventory\Item\ItemId::class;

    /**
     * @var array List of cached entries and corresponding name.
     */
    protected static $CACHED_ENTRIES;

}