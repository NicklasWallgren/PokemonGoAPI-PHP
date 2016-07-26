<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Inventory\AppliedItem as AppliedItemData;
use POGOProtos\Inventory\AppliedItems as AppliedItemsData;

/**
 * @method void setAppliedItems(AppliedItem[] $candies)
 * @method AppliedItem[] getAppliedItems()
 */
class AppliedItems extends Data {

    /**
     * @var AppliedItem[]
     */
    protected $appliedItems;

    /**
     * Add applied item to the list of applied items.
     *
     * @param AppliedItemData $appliedItem
     */
    public function add($appliedItem)
    {
        // Add the applied item to the list of applied items
        $this->appliedItems[] = AppliedItem::create($appliedItem);
    }

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param AppliedItemsData $data
     * @return static
     */
    public static function create($data)
    {
        // Create a instance
        $instance = new static();

        // Retrieve the items
        $items = $data->getItemArray();

        // Iterate through the list of items
        foreach ($items as $item) {
            // Add a applied item to the list of applied items
            $instance->add($item);
        }

        return $instance;
    }

}