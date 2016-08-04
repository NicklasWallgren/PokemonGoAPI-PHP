<?php

namespace NicklasW\PkmGoApi\Api\Map;

use NicklasW\PkmGoApi\Api\Map\Data\Resources\Fort;
use NicklasW\PkmGoApi\Api\Map\Data\Results\PokestopSpinResult;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Api\Support\MakeDataPropertiesCallable;
use NicklasW\PkmGoApi\Services\Request\MapRequestService;
use NicklasW\PkmGoApi\Services\Request\PokestopRequestService;
use POGOProtos\Networking\Responses\FortSearchResponse_Result;
use S2\S2LatLng;

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
class Pokestop extends Procedure {

    use MakeDataPropertiesCallable;

    /**
     * @var int The loot distance
     */
    protected static $LOOT_DISTANCE = 30;

    /**
     * @var Fort
     */
    protected $data;

    /**
     * @var int The fort cooldown timestamp
     */
    protected $cooldownTimestamp = 0;

    /**
     * Pokestop constructor.
     *
     * @param Fort $fortData
     */
    public function __construct($fortData)
    {
        $this->data = $fortData;
    }

    /**
     * Returns true if within range of the pokestop, false otherwise.
     *
     * @return boolean
     */
    public function isInRange()
    {
        // Retrieve the pokestop location
        $pokestopLocation = S2LatLng::fromDegrees($this->getLatitude(), $this->getLongitude());

        // The current player location
        $playerLocation = S2LatLng::fromDegrees($this->getCurrentLatitude(), $this->getCurrentLongitude());

        // Check if the distance is within the loot interval
        return $pokestopLocation->getEarthDistance($playerLocation) < self::$LOOT_DISTANCE;
    }

    /**
     * Returns true if available for spin, false otherwise.
     *
     * @return boolean
     */
    public function canSpin()
    {
        // Check if the pokestop is on cooldown
        $active = $this->cooldownTimestamp < microtime();

        return $this->isInRange() && $active;
    }

    /**
     * Spin the pokestop.
     *
     * @return PokestopSpinResult
     */
    public function spin()
    {
        // Retrieve the map resources
        $fortResponse = $this->getRequestService()->spin($this->getId(),
            $this->getLatitude(), $this->getLongitude());

        switch ($fortResponse->getResult()) {

            case FortSearchResponse_Result::SUCCESS:
                // Update inventory

                // Set the cooldown timestamp
                $this->cooldownTimestamp = $fortResponse->getCooldownCompleteTimestampMs();

                break;
        }

        return PokestopSpinResult::create($fortResponse);
    }

    public function hasLure()
    {

    }

    public function addLure()
    {

    }

    /**
     * Returns the pokestop details.
     */
    public function getDetails()
    {

    }

    /**
     * Returns the current latitude.
     *
     * @return double
     */
    protected function getCurrentLatitude()
    {
        return $this->getApplication()->getLatitude();
    }

    /**
     * Returns the current longitude.
     *
     * @return double
     */
    protected function getCurrentLongitude()
    {
        return $this->getApplication()->getLongitude();
    }

    /**
     * Returns the request service.
     *
     * @return PokestopRequestService
     */
    protected function getRequestService()
    {
        return new PokestopRequestService();
    }

}