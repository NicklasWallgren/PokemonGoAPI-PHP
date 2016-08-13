<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Journal;

use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokedexItem;
use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMeta;
use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMetaRegistry;
use NicklasW\PkmGoApi\Api\Support\MakeApiResourcesAvailable;

class Pokemon extends Data {

    use MakeApiResourcesAvailable;

    /**
     * @var integer
     */
    protected $timestampMs;

    /**
     * @var integer
     */
    protected $result;

    /**
     * @var integer
     */
    protected $pokemonId;

    /**
     * @var integer
     */
    protected $combatPoints;

    /**
     * @var integer
     */
    protected $pokemonDataId;

    /**
     * Returns the timestamp (in ms) of this log entry.
     *
     * @return integer
     */
    public function getTimestampMs() {
        return $this->timestampMs;
    }

    /**
     * Returns the catch result.
     * (1=success, 2=escaped)
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Returns pokemon id.
     *
     * @return int
     */
    public function getPokemonId()
    {
        return $this->pokemonId;
    }

    /**
     * Returns the combat points.
     *
     * @return int
     */
    public function getCombatPoints()
    {
        return $this->combatPoints;
    }

    /**
     * Returns the pokemon data id.
     *
     * @return int
     */
    public function getPokemonDataId()
    {
        return $this->pokemonDataId;
    }

    /**
     * Returns the pokemon metadata.
     *
     * @return PokemonMeta
     */
    public function getPokemonMeta()
    {
        return PokemonMetaRegistry::getByPokemonId($this->pokemonId);
    }

    /**
     * Returns the pokedex entry.
     *
     * @return PokedexItem
     */
    public function getPokedexEntry()
    {
        return $this->getPokedex()->get($this->pokemonId);
    }


}