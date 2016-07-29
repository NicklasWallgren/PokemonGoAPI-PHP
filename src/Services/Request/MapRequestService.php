<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Requests\GetMapResourcesRequest;
use NicklasW\PkmGoApi\Services\RequestService;

class MapRequestService extends RequestService {

    /**
     * Returns the map resources.
     *
     * @param double $latitude
     * @param double $longitude
     * @param array $mapCellIds
     * @return mixed
     * @throws \Exception
     * @throws AuthenticationException
     */
    public function getResources($latitude, $longitude, $mapCellIds)
    {
        $mapResourcesRequest = new GetMapResourcesRequest($latitude, $longitude, $mapCellIds);

        $this->requestHandler()->handle($mapResourcesRequest);

        return $mapResourcesRequest->getData();
    }

}