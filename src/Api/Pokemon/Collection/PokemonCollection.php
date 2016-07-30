<?php

namespace NicklasW\PkmGoApi\Api\Pokemon\Collection;

use Illuminate\Support\Collection;
use NicklasW\PkmGoApi\Api\Pokemon\Pokemon;

class PokemonCollection extends Collection {

    /**
     * Returns a sorted collection by name.
     *
     * @param bool $descending
     * @return static
     */
    public function sortByName($descending = false)
    {
        return $this->sortBy(function (Pokemon $pokemon1) {
            return $pokemon1->getName();
        }, SORT_REGULAR, $descending);
    }

    /**
     * Returns a sorted collection by level.
     *
     * @param bool $descending
     * @return static
     */
    public function sortByLevel($descending = false)
    {
        return $this->sortBy(function (Pokemon $pokemon1) {
            return $pokemon1->getLevel();
        }, SORT_REGULAR, $descending);

    }

    /**
     * Returns a sorted collection by combat points.
     *
     * @param bool $descending
     * @return static
     */
    public function sortByCp($descending = false)
    {
        return $this->sortBy(function (Pokemon $pokemon1) {
            return $pokemon1->getCp();
        }, SORT_REGULAR, $descending);

    }

    /**
     * Returns a sorted collection by Pokedex index.
     *
     * @param bool $descending
     * @return static
     */
    public function sortByPokedexIndex($descending = false)
    {
        return $this->sortBy(function (Pokemon $pokemon1) {
            return $pokemon1->getPokemonId();
        }, SORT_REGULAR, $descending);

    }

    /**
     * Returns a sorted collection by IV ratio.
     *
     * @param bool $descending
     * @return static
     */
    public function sortByIVRatio($descending = false)
    {
        return $this->sortBy(function (Pokemon $pokemon1) {
            return $pokemon1->getIVRatio();
        }, SORT_REGULAR, $descending);
    }

}