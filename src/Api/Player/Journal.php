<?php

namespace NicklasW\PkmGoApi\Api\Player;

use NicklasW\PkmGoApi\Api\Player\Data\Journal\Log;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\JournalRequestService;

class Journal extends Procedure {

    /**
     * Returns the forts log entries.
     *
     * @return Data\Journal\Fort[]
     */
    public function getForts()
    {
        return $this->getData()->getForts();
    }

    /**
     * Returns the pokemon log entries.
     *
     * @return Data\Journal\Pokemon[]
     */
    public function getPokemons()
    {
        return $this->getData()->getPokemons();
    }

    /**
     * Returns the log entries.
     *
     * @return Log
     */
    public function getEntries()
    {
        return $this->getData();
    }

    /**
     *
     */
    public function update()
    {
        // Retrieves the player metadata
        $data = $this->getRequestService()->getJournal();

        // Set the log entries
        $this->data = Log::create($data->getLogEntries());
    }

    /**
     * Returns the request service.
     *
     * @return JournalRequestService
     */
    protected function getRequestService()
    {
        return new JournalRequestService();
    }

}