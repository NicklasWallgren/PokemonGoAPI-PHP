<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Data\PokedexEntry;

class Pokedex extends Data {

    /**
     * @var array
     */
    protected $pokedexItems = array();

    /**
     * Add pokedex item.
     *
     * @param PokedexEntry $pokedexEntry
     */
    public function add($pokedexEntry)
    {
        // Create the pokedex item
        $pokedexItem = PokedexItem::create($pokedexEntry);

        // Add the pokedex item to the list of pokedex items
        $this->pokedexItems[$pokedexItem->getPokedexEntryNumber()] = $pokedexItem;
    }

    /**
     * Gets the pokedex item by pokemon id
     *
     * @param integer $pokemonId
     * @return PokedexItem
     */
    public function get($pokemonId)
    {
        return $this->pokedexItems[$pokemonId];
    }

}