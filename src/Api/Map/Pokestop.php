<?php

namespace NicklasW\PkmGoApi\Api\Map;

use NicklasW\PkmGoApi\Api\Map\Data\Resources\Fort;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\MapRequestService;
use S2\S2LatLng;

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
     * Returns true if available for looting, false otherwise.
     *
     * @return boolean
     */
    public function canLoot()
    {
        // Check if the pokestop is on cooldown
        $active = $this->cooldownTimestamp < microtime();

        return $this->isInRange() && $active;
    }

    /**
     * Loot the pokestop.
     */
    public function loot()
    {

    }

    public function hasLure()
    {

    }

    public function addLure()
    {

    }

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
     * @return MapRequestService
     */
    protected function getRequestService()
    {
        return new MapRequestService();
    }


}