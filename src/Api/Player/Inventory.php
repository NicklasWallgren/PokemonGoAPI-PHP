<?php

namespace NicklasW\PkmGoApi\Api\Player;

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Items;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\InventoryRequestService;

class Inventory extends Procedure {

    /**
     * @var Items
     */
    protected $items;

    /**
     * Returns the items.
     *
     * @returns Items
     */
    public function getItems()
    {
        // Check if the items is available since earlier
        if ($this->items === null) {
            $this->update();
        }
        
        return $this->items;
    }

    /**
     * Updates the player profile with the latest data.
     */
    public function update()
    {
        // Retrieves the player inventory metadata
        $playerInventory = $this->getRequestService()->getInventory();

        // Retrieve the inventory items
        $inventoryItems = $playerInventory->getInventoryDelta();

        // Set the items
        $this->items = Items::create($inventoryItems);
    }

    /**
     * Returns the request service.
     *
     * @return InventoryRequestService
     */
    protected function getRequestService()
    {
        return new InventoryRequestService();
    }

}