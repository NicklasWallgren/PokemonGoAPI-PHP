<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Requests\VerifyChallengeRequest;
use NicklasW\PkmGoApi\Services\RequestService;

class VerifyChallengeRequestService extends RequestService {

    /**
     * Returns the VerifyChallengeRequest metadata.
     *
     * @param string $token
     * @returns VerifyChallengeResponse
     */
    public function verifyChallenge($token)
    {
        $verifyChallengeRequest = new VerifyChallengeRequest($token);

        $this->requestHandler()->handle($verifyChallengeRequest);

        return $verifyChallengeRequest->getData();
    }
}
