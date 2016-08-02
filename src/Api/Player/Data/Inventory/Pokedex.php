<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
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
     * @return PokedexItem
     */
    public function get($pokemonId)
    {
        return $this->items[$pokemonId];
    }

}