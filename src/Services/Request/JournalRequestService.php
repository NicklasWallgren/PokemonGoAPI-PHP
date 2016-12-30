<?php

namespace NicklasW\PkmGoApi\Services\Request;

use NicklasW\PkmGoApi\Handlers\Exception;
use NicklasW\PkmGoApi\Requests\GetJournalRequest;
use NicklasW\PkmGoApi\Services\RequestService;
use POGOProtos\Networking\Responses\SfidaActionLogResponse;

class JournalRequestService extends RequestService {

    /**
     * Returns the player metadata.
     *
     * @throws Exception
     * @returns SfidaActionLogResponse
     */
    public function getJournal()
    {
        $journalRequest = new GetJournalRequest();

        $this->requestHandler()->handle($journalRequest);

        return $journalRequest->getData();
    }

}