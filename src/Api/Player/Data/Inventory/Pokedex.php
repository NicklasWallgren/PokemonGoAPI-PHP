<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Api\Support\Enums\PokemonId;
use POGOProtos\Data\PokedexEntry;

/**
 * @method void setItems(PokedexItem[] $items)
 * @method PokedexItem[] getItems()
 */
class Pokedex extends Data {

    /**
     * @var array
     */
    protected $items = array();

    /**
     * Add pokedex item.
     *
     * @param PokedexEntry $pokedexEntry
     */
    public function add($pokedexEntry)
    {
        // Create the pokedex item
        $item = PokedexItem::create($pokedexEntry);

        // Add the pokedex item to the list of pokedex items
        $this->items[$item->getPokemonId()] = $item;
    }

    /**
     * Gets the pokedex item by pokemon id
     *
     * @param integer $pokemonId
     * @return PokedexItem|null
     */
    public function get($pokemonId)
    {
        // Check whether a valid pokemon id was provided
        if (!PokemonId::isValid($pokemonId)) {
            return null;
        }

        // Check if the pokemon exists within the pokedex
        if (array_key_exists($pokemonId, $this->items)) {
            return $this->items[$pokemonId];
        }

        return $this->createEmptyItem($pokemonId);
    }

    /**
     * Creates a empty PokedexItem.
     *
     * @param integer $pokemonId
     * @return PokedexItem
     */
    protected function createEmptyItem($pokemonId)
    {
        // Create a new pokedex item
        $entry = new PokedexItem();

        // Set the pokemon id
        $entry->setPokemonId($pokemonId);

        return $entry;
    }

}