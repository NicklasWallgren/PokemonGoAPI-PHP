<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use Exception;
use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Facades\Log;
use POGOProtos\Inventory\InventoryDelta;
use POGOProtos\Inventory\InventoryItem;
use POGOProtos\Inventory\InventoryItemData;
use POGOProtos\Inventory\Item\ItemId;

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
     * @var EggPokemon[]
     */
    protected $eggPokemon = array();

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
        $items = $data->getInventoryItems();

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
            // Retrieve the item data instance
            $item = $itemData->getItem();

            // Retrieve the item data
            $this->items[$item->getItemId()] = Item::create($item);
        } elseif (self::isEggPokemon($itemData)) {
            // Retrieve the applied items data
            $this->eggPokemon[] = EggPokemon::create($itemData->getPokemonData());

        } elseif (self::isPokemon($itemData)) {
            // Retrieve the pokemon data
            $this->pokeBank->add($itemData->getPokemonData());

        } elseif (self::isCandy($itemData)) {
            // Retrieve the candy item data
            $this->candyBank->add($itemData->getCandy());

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
     * Returns item instance or null.
     *
     * @param integer $id
     * @return Item
     * @throws Exception
     */
    public function getItemById($id)
    {
        // Check if we retrieved a valid item id
        if (!ItemId::isValid($id)) {
            throw new Exception(sprintf('Invalid item id provided. Id \'%s\'', $id));
        }

        // Check if we have that particular item in the inventory
        if (!array_key_exists($id, $this->items)) {
            return null;
        }

        return $this->items[$id];
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
        return $itemData->getCandy() != null;
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

    /**
     * Returns true if the item data is of type egg pokemon item, false otherwise.
     *
     * @param InventoryItemData $itemData
     * @return boolean
     */
    protected static function isEggPokemon($itemData)
    {
        return $itemData->getPokemonData() != null && $itemData->getPokemonData()->getIsEgg();
    }

}