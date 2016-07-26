<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;


use NicklasW\PkmGoApi\Api\Data\Data;

/**
 * @method void setPokedexEntryNumber(integer $pokedexEntryNumber)
 * @method void setTimesEncountered(integer $timesEncountered)
 * @method void setTimesCaptured(integer $timesCaptured)
 * @method void setEvolutionStonePieces(integer $evolutionStonePieces)
 * @method void setEvolutionStones(integer $evolutionStones)
 *
 * @method int getPokedexEntryNumber()
 * @method int getTimesEncountered()
 * @method int getTimesCaptured()
 * @method int getEvolutionStonePieces()
 * @method int getEvolutionStones()
 */
class PokedexItem extends Data {

    /**
     * @var int
     */
    protected $pokedexEntryNumber = 0;

    /**
     * @var int
     */
    protected $timesEncountered = 0;

    /**
     * @var int
     */
    protected $timesCaptured = 0;

    /**
     * @var int
     */
    protected $evolutionStonePieces = 0;

    /**
     * @var int
     */
    protected $evolutionStones = 0;


}