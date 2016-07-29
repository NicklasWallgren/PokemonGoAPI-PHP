<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use Exception;
use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Facades\Log;
use POGOProtos\Inventory\InventoryDelta;
use POGOProtos\Inventory\InventoryItem;
use POGOProtos\Inventory\InventoryItemData;

/**
 * @method void setPokeBank(PokeBank $pokeBank)
 * @method void setItems(Item[] $items)
 * @method void setCandyBank(CandyBank $candyBank)
 * @method void setPokedex(Pokedex $pokedex)
 * @method void setAppliedItems(AppliedItems $appliedItems)
 * @method PokeBank getPokeBank()
 * @method Item[] getItems()
 * @method CandyBank getCandyBank()
 * @method Pokedex getPokedex()
 * @method EggIncubators getEggIncubators()
 * @method AppliedItems getAppliedItems()
 * @method Stats getStats()
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
     * @var Pokedex
     */
    protected $pokedex;

    /**
     * @var EggIncubators
     */
    protected $eggIncubators;

    /**
     * @var AppliedItems
     */
    protected $appliedItems;

    /**
     * @var Stats
     */
    protected $stats;

    /**
     * Items constructor.
     */
    public function __construct()
    {
        $this->pokeBank = new PokeBank();
        $this->candyBank = new CandyBank();
        $this->pokedex = new Pokedex();
        $this->eggIncubators = new EggIncubators();
        $this->appliedItems = new AppliedItems();
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

        } elseif (self::isPokedexItem($itemData)) {
            // Retrieve the pokedex item data
            $this->pokedex->add($itemData->getPokedexEntry());

        } elseif (self::isEggIncubators($itemData)) {
            // Retrieve the egg incubators item data
            $this->eggIncubators = EggIncubators::create($itemData->getEggIncubators());

        } elseif (self::isAppliedItems($itemData)) {
            // Retrieve the applied items data
            $this->appliedItems = AppliedItems::create($itemData->getAppliedItems());

        } elseif (self::isPlayerStats($itemData)) {
            // Retrieve the applied items data
            $this->stats = Stats::create($itemData->getPlayerStats());

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

    /**
     * Returns true if the item data is of type pokedex item, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */
    protected static function isPokedexItem($itemData)
    {
        return $itemData->getPokedexEntry() != null;
    }

    /**
     * Returns true if the item data is of type pokedex item, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */
    protected static function isEggIncubators($itemData)
    {
        return $itemData->getEggIncubators() != null;
    }

    /**
     * Returns true if the item data is of type pokedex item, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */
    protected static function isAppliedItems($itemData)
    {
        return $itemData->getAppliedItems() != null;
    }

    /**
     * Returns true if the item data is of type pokedex item, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */
    protected static function isPlayerStats($itemData)
    {
        return $itemData->getPlayerStats() != null;
    }

}