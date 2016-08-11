<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Inventory\EggIncubatorType;
use POGOProtos\Inventory\Item\ItemId;

/**
 * @method void setId(string $id)
 * @method void setItemId(int $itemId)
 * @method void setIncubatorType(int $incubatorType)
 * @method void setUsesRemaining(int $usesRemaining)
 * @method void setPokemonId(int $pokemonId)
 * @method void setStartKmWalked(int $startKmWalked)
 * @method void setTargetKmWalked(int $targetKmWalked)

 * @method string getId()
 * @method int getItemId()
 * @method int getIncubatorType()
 * @method int getUsesRemaining()
 * @method int getPokemonId()
 * @method int getStartKmWalked()
 * @method int getTargetKmWalked()
 */
class EggIncubator extends Data {

    /**
     * @var string
     */
    protected $id = "";

    /**
     * @var int
     */
    protected $itemId = ItemId::ITEM_UNKNOWN;

    /**
     * @var int
     */
    protected $incubatorType = EggIncubatorType::INCUBATOR_NONE;

    /**
     * @var int
     */
    protected $usesRemaining = 0;

    /**
     * @var int
     */
    protected $pokemonId = 0;

    /**
     * @var int
     */
    protected $startKmWalked = 0;

    /**
     * @var int
     */
    protected $targetKmWalked = 0;

}