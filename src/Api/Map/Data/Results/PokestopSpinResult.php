<?php

namespace NicklasW\PkmGoApi\Api\Map\Data\Results;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Networking\Responses\FortSearchResponse_Result;

class PokestopSpinResult extends Data {

    /**
     * @var int
     */
    private $result = FortSearchResponse_Result::NO_RESULT_SET;

    /**
     * @var array
     */
    protected $itemsAwarded = array(); // repeated .POGOProtos.Inventory.Item.ItemAward items_awarded = 2

    /**
     * @var int
     */
    protected $gemsAwarded = 0; // optional int32 gems_awarded = 3

    /**
     * @var null
     */
    protected $pokemonDataEgg = null; // optional .POGOProtos.Data.PokemonData pokemon_data_egg = 4

    /**
     * @var int
     */
    protected $experienceAwarded = 0; // optional int32 experience_awarded = 5

    /**
     * @var int
     */
    protected $cooldownCompleteTimestampMs = 0; // optional int64 cooldown_complete_timestamp_ms = 6

    /**
     * @var int
     */
    protected $chainHackSequenceNumber = 0;

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getItemsAwarded()
    {
        return $this->itemsAwarded;
    }

    /**
     * @return int
     */
    public function getGemsAwarded()
    {
        return $this->gemsAwarded;
    }

    /**
     * @return null
     */
    public function getPokemonDataEgg()
    {
        return $this->pokemonDataEgg;
    }

    /**
     * @return int
     */
    public function getExperienceAwarded()
    {
        return $this->experienceAwarded;
    }

    /**
     * @return int
     */
    public function getCooldownCompleteTimestampMs()
    {
        return $this->cooldownCompleteTimestampMs;
    }

    /**
     * @return int
     */
    public function getChainHackSequenceNumber()
    {
        return $this->chainHackSequenceNumber;
    }

}