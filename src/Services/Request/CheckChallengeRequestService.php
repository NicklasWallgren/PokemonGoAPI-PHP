<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Handlers\Exception;
use NicklasW\PkmGoApi\Requests\CheckChallengeRequest;
use NicklasW\PkmGoApi\Services\RequestService;
use POGOProtos\Networking\Responses\CheckChallengeResponse;

class CheckChallengeRequestService extends RequestService {

    /**
     * Returns the CheckChallengeRequest metadata.
     *
     * @throws Exception
     * @returns CheckChallengeResponse
     */
    public function checkChallenge()
    {
        $checkChallengeRequest = new CheckChallengeRequest();

        $this->requestHandler()->handle($checkChallengeRequest);

        return $checkChallengeRequest->getData();
    }
}

