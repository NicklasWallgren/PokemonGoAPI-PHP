<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setItemId(integer $itemId)
 * @method void setCount(integer $count)
 * @method void setUnseen(boolean $unseen)
 *
 * @method integer getItemId()
 * @method integer getCount()
 * @method boolean getUnseen()
 */

class Item extends Data {

    /**
     * @var integer The item id, POGOProtos\Inventory\ItemId
     */
    protected $itemId;

    /**
     * @var integer
     */
    protected $count;

    /**
     * @var boolean
     */
    protected $unseen;

}