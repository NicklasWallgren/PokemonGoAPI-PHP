<?php

namespace NicklasW\PkmGoApi\Api\Player;

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\AppliedItems;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\CandyBank;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\EggIncubators;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\EggPokemon;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Item;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Items;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokeBank;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Stats;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Facades\Log;
use NicklasW\PkmGoApi\Services\Request\InventoryRequestService;

use POGOProtos\Networking\Responses\RecycleInventoryItemResponse_Result;

class Inventory extends Procedure {

    /**
     * @var Items
     */
    protected $items;

    /**
     * Returns the poke bank.
     *
     * @return PokeBank
     */
    public function getPokeBank()
    {
        return $this->getItems()->getPokeBank();
    }

    /**
     * Returns the candy bank.
     *
     * @return CandyBank
     */
    public function getCandyBank()
    {
        return $this->getItems()->getCandyBank();
    }

    /**
     * Returns the pokedex.
     *
     * @return Pokedex
     */
    public function getPokedex()
    {
        return $this->getItems()->getPokedex();
    }

    /**
     * Returns the egg incubators.
     *
     * @return EggIncubators
     */
    public function getEggIncubators()
    {
        return $this->getItems()->getEggIncubators();
    }

    /**
     * Returns the inventory items.
     *
     * @return Item[]
     */
    public function getInventoryItems()
    {
        return $this->getItems()->getItems();
    }

    /**
     * Returns applied items.
     *
     * @return AppliedItems
     */
    public function getAppliedItems()
    {
        return $this->getItems()->getAppliedItems();
    }

    /**
     * Returns stats.
     *
     * @return Stats
     */
    public function getStats()
    {
        return $this->getItems()->getStats();
    }

    /**
     * Returns egg pokemon.
     *
     * @return EggPokemon[]
     */
    public function getEggPokemon()
    {
        return $this->getItems()->getEggPokemon();
    }

    /**
     * Returns the items.
     *
     * @returns Items
     */
    public function getItems()
    {
        // Check if the items is available since earlier
        if ($this->items === null) {
            Log::debug(sprintf('[#%s] No items in inventory - Fetching the latest inventory', __CLASS__));

            $this->update();
        }

        return $this->items;
    }

    /**
     * Updates the player profile with the latest data.
     */
    public function update()
    {
        Log::debug(sprintf('[#%s] Retrieving inventory', __CLASS__));

        // Retrieves the player inventory metadata
        $playerInventory = $this->getRequestService()->getInventory();

        // Retrieve the inventory items
        $inventoryItems = $playerInventory->getInventoryDelta();

        // Set the items
        $this->items = Items::create($inventoryItems);

        Log::debug(sprintf('[#%s] Retrieved inventory.', __CLASS__));
    }

    /**
     * Recycle inventory item
     *
     * @param int $itemId
     * @param int $count
     * @throws Exception
     *
     * @return  RecycleInventoryItemResponse
     */
    public function recycle($itemId, $count)
    {
        // Execute the API request
        $response = $this->getRequestService()->recycle($itemId, $count);

        // Check if the request was successfully executed
        if ($response->getResult() !== RecycleInventoryItemResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during item recycle. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), RecycleInventoryItemResponse_Result::toString($response->getResult())));
        }

        // Update inventory
        $this->update();

        return $response;
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