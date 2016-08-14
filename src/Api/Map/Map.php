<?php

namespace NicklasW\PkmGoApi\Api\Map;

use Exception;
use NicklasW\PkmGoApi\Api\Map\Data\Resource;
use NicklasW\PkmGoApi\Api\Map\Data\Resources\Fort;
use NicklasW\PkmGoApi\Api\Map\Support\S2;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\MapRequestService;
use POGOProtos\Networking\Responses\GetMapObjectsResponse;

class Map extends Procedure {

    /**
     * Map constructor.
     */
    public function __construct()
    {
        $this->data = new Resource();
    }

    /**
     * Returns the pokestops.
     *
     * @return Fort[]
     */
    public function getPokestops()
    {
        return $this->data->getPokestops();
    }

    /**
     * Returns gyms.
     *
     * @return Fort[]
     */
    public function getGyms()
    {
        return $this->data->getGyms();
    }

    /**
     * Returns the catchable pokemon located on the map.
     */
    public function getCatchablePokemon()
    {


    }

    /**
     * Returns the map resources.
     *
     * @throws Exception
     */
    public function update()
    {
        // Retrieve the map resources
        $resources = $this->getMapResources();

        // Create the resource data instance
        $this->data = Resource::create($resources);
    }

    /**
     * Returns the map resources.
     *
     * @return GetMapObjectsResponse
     */
    protected function getMapResources()
    {
        // Retrieved the latitude
        $latitude = $this->getApplication()->getLatitude();

        // Retrieved the longitude
        $longitude = $this->getApplication()->getLongitude();

        // Retrieve a list of cell ids from the latitude and longitude
        $cellIds = S2::getCellIds($latitude, $longitude);

        // Retrieve the map resources
        return $this->getRequestService()->getResources($latitude, $longitude, $cellIds);
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