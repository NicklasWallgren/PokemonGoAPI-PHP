<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use Exception;
use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Inventory\InventoryDelta;
use POGOProtos\Inventory\InventoryItem;
use POGOProtos\Inventory\InventoryItemData;

/**
 * @method void setPokeBank(PokeBank $pokeBank)
 * @method void setItems(Item[] $items)
 * @method void setCandyBank(CandyBank $candyBank)
 *
 * @method PokeBank getPokeBank()
 * @method Item[] getItems()
 * @method CandyBank getCandyBank()
 */
class Items extends Data {

    /**
     * @var PokeBank
     */
    protected $pokeBank;

    /**
     * @var Item[]
     */
    protected $items;

    /**
     * @var CandyBank
     */
    protected $candyBank;

    /**
     * Items constructor.
     */
    public function __construct()
    {
        $this->pokeBank = new PokeBank();
        $this->candyBank = new CandyBank();
    }

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param InventoryDelta $data
     * @return static
     */
    public static function create($data)
    {
        // Initialize the Items instance
        $instance = new static();

        /** @var InventoryItem[] $items */
        $items = $data->getInventoryItemsArray();

        // Iterate through the inventory items
        foreach ($items as $item) {
            // Create the corresponding item type
            $instance->createItemData($item->getInventoryItemData());
        }

        return $instance;
    }

    /**
     * Creates item data.
     *
     * @param InventoryItemData $itemData
     * @throws Exception
     */
    protected function createItemData($itemData)
    {
        if (self::isItem($itemData)) {
            // Retrieve the item data
            $this->items[] = Item::create($itemData->getItem());

        } elseif (self::isPokemon($itemData)) {
            // Retrieve the pokemon data
            $this->pokeBank->add($itemData->getPokemonData());

        } elseif (self::isCandy($itemData)) {
            // Retrieve the candy item data
            $this->candyBank->add($itemData->getPokemonFamily());

        } else {
            Log::warning('Unknown item type encountered', array('item' => $itemData));
        }
    }

    /**
     * Returns true if the item data is of type item, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */
    protected static function isItem($itemData)
    {
        return $itemData->getItem() != null;
    }

    /**
     * Returns true if the item data is of type pokemon, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */
    protected static function isPokemon($itemData)
    {
        return $itemData->getPokemonData() != null;
    }

    /**
     * Returns true if the item data is of type candy, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */

    protected static function isCandy($itemData)
    {
        return $itemData->getPokemonFamily() != null;
    }

}