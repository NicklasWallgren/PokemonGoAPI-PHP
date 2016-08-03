<?php

namespace NicklasW\PkmGoApi\Services\Request;

use Exception;
use NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Requests\FortSearchRequest;
use NicklasW\PkmGoApi\Requests\GetMapResourcesRequest;
use NicklasW\PkmGoApi\Services\RequestService;
use POGOProtos\Networking\Responses\FortSearchResponse;
use POGOProtos\Networking\Responses\GetMapObjectsResponse;

/**
 * Class PokestopRequestService
 *
 * @package NicklasW\PkmGoApi\Services\Request
 */
class PokestopRequestService extends RequestService {

    /**
     * Spin a pokestop.
     *
     * @param $id
     * @param $latitude
     * @param $longitude
     * @return FortSearchResponse
     * @throws AuthenticationException
     * @throws Exception
     */
    public function spin($id, $latitude, $longitude)
    {
        $fortSearchRequest = new FortSearchRequest($id, $latitude, $longitude);

        $this->requestHandler()->handle($fortSearchRequest);

        return $fortSearchRequest->getData();
    }

}