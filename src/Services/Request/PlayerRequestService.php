<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Handlers\Exception;
use NicklasW\PkmGoApi\Requests\GetPlayerRequest;
use NicklasW\PkmGoApi\Services\RequestService;
use POGOProtos\Networking\Responses\GetPlayerResponse;

class PlayerRequestService extends RequestService {

    /**
     * Returns the player metadata.
     *
     * @throws Exception
     * @returns GetPlayerResponse
     */
    public function getPlayer()
    {
        $playerRequest = new GetPlayerRequest();

        $this->requestHandler()->handle($playerRequest);

        return $playerRequest->getData();
    }

}