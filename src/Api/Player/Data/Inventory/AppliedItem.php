<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Inventory\Item\ItemId;
use POGOProtos\Inventory\Item\ItemType;

/**
 * @method void setItemId(int $itemId)
 * @method void setItemType(int $itemType)
 * @method void setExpireMs(int $expireMs)
 * @method void setAppliedMs(int $appliedMs)

 * @method int getItemId()
 * @method int getItemType()
 * @method int getExpireMs()
 * @method int getAppliedMs()
 */
class AppliedItem extends Data {

    /**
     * @var int
     */
    protected $itemId = ItemId::ITEM_UNKNOWN;

    /**
     * @var int
     */
    protected $itemType = ItemType::ITEM_TYPE_NONE;

    /**
     * @var int
     */
    protected $expireMs = 0;

    /**
     * @var int
     */
    protected $appliedMs = 0;

}