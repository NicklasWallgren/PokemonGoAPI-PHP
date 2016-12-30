<?php

namespace NicklasW\PkmGoApi\Api\Player;

use Exception;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\AppliedItems;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\CandyBank;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\EggIncubators;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\EggPokemon;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Item;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Items;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokeBank;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Pokedex;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Stats;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Api\Support\Enums\GenericEnum;
use NicklasW\PkmGoApi\Facades\Log;
use NicklasW\PkmGoApi\Services\Request\InventoryRequestService;
use POGOProtos\Networking\Responses\RecycleInventoryItemResponse;
use POGOProtos\Networking\Responses\RecycleInventoryItemResponse_Result;
use POGOProtos\Networking\Responses\UseIncenseResponse;
use POGOProtos\Networking\Responses\UseIncenseResponse_Result;
use POGOProtos\Networking\Responses\UseItemXpBoostResponse;
use POGOProtos\Networking\Responses\UseItemXpBoostResponse_Result;

/**
 * @method void setPokeBank(PokeBank $pokeBank)
 * @method void setItems(Item[] $items)
 * @method void setCandyBank(CandyBank $candyBank)
 * @method void setPokedex(Pokedex $pokedex)
 * @method void setAppliedItems(AppliedItems $appliedItems)
 * @method void setStats(Stats $stats)
 * @method void setEggPokemon(EggPokemon[] $eggPokemon)
 * @method PokeBank getPokeBank()
 * @method Item[] getItems()
 * @method CandyBank getCandyBank()
 * @method Pokedex getPokedex()
 * @method EggIncubators getEggIncubators()
 * @method AppliedItems getAppliedItems()
 * @method Stats getStats()
 * @method EggPokemon[] getEggPokemon()
 */
class Inventory extends Procedure
{

    /**
     * @var Items
     */
    protected $data;

    /**
     * Returns the items.
     *
     * @returns Items
     */
    public function getData()
    {
        return parent::getData();
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
        $this->data = Items::create($inventoryItems);

        Log::debug(sprintf('[#%s] Retrieved inventory.', __CLASS__));
    }

    /**
     * Recycle inventory item
     *
     * @param int $itemId
     * @param int $count
     * @throws Exception
     * @return RecycleInventoryItemResponse
     */
    public function recycle($itemId, $count)
    {
        // Retrieve the item from the inventory
        $item = $this->data->getItemById($itemId);

        // Retrieve the item from the inventory, validate the capacity
        if ($item == null || $item->getCount() < $count) {
            return RecycleInventoryItemResponse_Result::ERROR_NOT_ENOUGH_COPIES;
        }

        // Execute the API request
        $response = $this->getRequestService()->recycle($itemId, $count);

        // Check if the request was successfully executed
        if ($response->getResult() !== RecycleInventoryItemResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during item recycle. Result: \'%s\' Code: \'%s\'',
                $response->getResult(),
                GenericEnum::name(RecycleInventoryItemResponse_Result::class, $response->getResult())));
        }

        // Update inventory to reflect on the changes
        $item->setCount($item->getCount() - $count);

        return $response;
    }

    /**
     * Use incense item
     *
     * @param int $itemId
     * @throws Exception
     * @return UseIncenseResponse
     */
    public function useIncense($itemId)
    {
        // Execute the API request
        $response = $this->getRequestService()->useIncense($itemId);

        // Check if the request was successfully executed
        if ($response->getResult() !== UseIncenseResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during item usage. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), GenericEnum::name(UseIncenseResponse_Result::class, $response->getResult())));
        }

        // Update inventory
        $this->update();

        return $response;
    }

    /**
     * Use XP Boost item
     *
     * @param int $itemId
     * @throws Exception
     * @return UseItemXpBoostResponse
     */
    public function useItemXpBoost($itemId)
    {
        // Execute the API request
        $response = $this->getRequestService()->useItemXpBoost($itemId);

        // Check if the request was successfully executed
        if ($response->getResult() !== UseItemXpBoostResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during item usage. Result: \'%s\' Code: \'%s\'',
                $response->getResult(),
                GenericEnum::name(UseItemXpBoostResponse_Result::class, $response->getResult())));
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