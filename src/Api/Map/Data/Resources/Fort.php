<?php

namespace NicklasW\PkmGoApi\Api\Map\Data\Resources;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Enums\PokemonId;
use POGOProtos\Enums\TeamColor;
use POGOProtos\Map\Fort\FortRenderingType;
use POGOProtos\Map\Fort\FortSponsor;
use POGOProtos\Map\Fort\FortType;


/**
 * @method void setId(string $id)
 * @method void setLastModifiedTimestampMs(int $lastModifiedTimestampMs)
 * @method void setLatitude(int $latitude)
 * @method void setLongitude(int $longitude)
 * @method void setEnabled(boolean $enabled)
 * @method void setType(int $type)
 * @method void setOwnedByTeam(int $ownedByTeam)
 * @method void setGuardPokemonId(int $candies)
 * @method void setGuardPokemonCp(int $candies)
 * @method void setGymPoints(int $gymPoints)
 * @method void setIsInBattle(boolean $isInBattle)
 * @method void setCooldownCompleteTimestampMs(int $cooldownCompleteTimestampMs)
 * @method void setRenderingType(int $candies)
 * @method void setActiveFortModifier(int $activeFortModifier)
 * @method void setLureInfo($lureInfo)
 *
 * @method string getId()
 * @method int getLastModifiedTimestampMs()
 * @method int getLatitude()
 * @method int getLongitude()
 * @method boolean getEnabled()
 * @method int getType()
 * @method int getOwnedByTeam()
 * @method int getGuardPokemonId()
 * @method int getGuardPokemonCp()
 * @method int getGymPoints()
 * @method boolean getIsInBattle()
 * @method int getCooldownCompleteTimestampMs()
 * @method int getRenderingType()
 * @method int getActiveFortModifier()
 * @method void getLureInfo()
*/
class Fort extends Data {

    /**
     * @var string
     */
    protected $id = "";

    /**
     * @var int
     */
    protected $lastModifiedTimestampMs = 0;

    /**
     * @var int
     */
    protected $latitude = 0;

    /**
     * @var int
     */
    protected $longitude = 0;

    /**
     * @var bool
     */
    protected $enabled = false;

    /**
     * @var
     */
    protected $type = FortType::GYM;

    /**
     * @var
     */
    protected $ownedByTeam = TeamColor::NEUTRAL;

    /**
     * @var
     */
    protected $guardPokemonId = PokemonId::MISSINGNO;

    /**
     * @var int
     */
    protected $guardPokemonCp = 0;

    /**
     * @var int
     */
    protected $gymPoints = 0;

    /**
     * @var bool
     */
    protected $isInBattle = false;

    /**
     * @var int
     */
    protected $cooldownCompleteTimestampMs = 0;

    /**
     * @var
     */
    protected $sponsor = FortSponsor::UNSET_SPONSOR;

    /**
     * @var
     */
    protected $renderingType = FortRenderingType::NONE;

    /**
     * @var string
     */
    protected $activeFortModifier = "";

    /**
     * @var
     */
    protected $lureInfo = null;

}