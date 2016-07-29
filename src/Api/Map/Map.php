<?php

namespace NicklasW\PkmGoApi\Api\Map;

use Exception;
use NicklasW\PkmGoApi\Api\Map\Support\S2;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\MapRequestService;

class Map extends Procedure {

    /**
     * Returns the map resources.
     *
     * @param double $latitude
     * @param double $longitude
     * @throws Exception
     */
    public function getResources($latitude, $longitude)
    {
        // Retrieve a list of cell ids from the latitude and longitude
        $cellIds = S2::getCellIds($latitude, $longitude);

        // Retrieve the map resources
        $resources = $this->getRequestService()->getResources($latitude, $longitude, $cellIds);

        print_r($resources);

        die();

        
        
        throw new Exception('To be implemented');
    }





    /**
     * Returns the catchable pokemons located on the map.
     */
    public function getCatchablePokemons()
    {
        throw new Exception('To be implemented');
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