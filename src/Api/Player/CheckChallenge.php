<?php

namespace NicklasW\PkmGoApi\Api\Player;

use NicklasW\PkmGoApi\Api\Player\Data\CheckChallenge\CheckChallengeData;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\CheckChallengeRequestService;

/**
 * @method array checkChallenge()
 */
class CheckChallenge extends Procedure {

    /**
     * Returns the request data.
     *
     * @returns CheckChallengeData
     */
    public function getData()
    {
        return parent::getData();
    }

    /**
     * Updates the player CheckChallenge with the latest data.
     */
    public function update()
    {
        // Retrieves the checkChallenge metadata
        $data = $this->getRequestService()->checkChallenge();

        // Set the checkChallenge data
        $this->data = CheckChallengeData::create($data); 
    }

    /**
     * Returns the request service.
     *
     * @return CheckChallengeRequestService
     */
    protected function getRequestService()
    {
        return new CheckChallengeRequestService();
    }
}

