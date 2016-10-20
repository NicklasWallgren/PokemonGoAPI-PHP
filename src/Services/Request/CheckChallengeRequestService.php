<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Requests\CheckChallengeRequest;
use NicklasW\PkmGoApi\Services\RequestService;

class CheckChallengeRequestService extends RequestService {

    /**
     * Returns the CheckChallengeRequest metadata.
     *
     * @throws \NicklasW\PkmGoApi\Handlers\Exception
     * @returns CheckChallengeResponse
     */
    public function checkChallenge()
    {
        $checkChallengeRequest = new CheckChallengeRequest();

        $this->requestHandler()->handle($checkChallengeRequest);

        return $checkChallengeRequest->getData();
    }

}
