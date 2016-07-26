<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Requests\GetPlayerRequest;
use NicklasW\PkmGoApi\Services\RequestService;

class PlayerRequestService extends RequestService {

    /**
     * Returns the player metadata.
     *
     * @throws \NicklasW\PkmGoApi\Handlers\Exception
     * @returns GetPlayerResponse
     */
    public function getPlayer()
    {
        $playerRequest = new GetPlayerRequest();

        $this->requestHandler()->handle($playerRequest);

        return $playerRequest->getData();
    }

}