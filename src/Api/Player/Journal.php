<?php

namespace NicklasW\PkmGoApi\Api\Player;

use NicklasW\PkmGoApi\Api\Player\Data\Journal\Log;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\JournalRequestService;

class Journal extends Procedure {

    /**
     * @var Log
     */
    protected $log;

    /**
     * Returns the forts log entries.
     *
     * @return Data\Journal\Fort[]
     */
    public function getForts()
    {
        return $this->getEntries()->getForts();
    }

    /**
     * Returns the pokemon log entries.
     *
     * @return Data\Journal\Pokemon[]
     */
    public function getPokemons()
    {
        return $this->getEntries()->getPokemons();
    }

    /**
     * Returns the log entries.
     *
     * @return Log
     */
    public function getEntries()
    {
        // Check if the log entries is defined
        if ($this->log == null) {
            $this->update();
        }

        return $this->log;
    }

    /**
     *
     */
    public function update()
    {
        // Retrieves the player metadata
        $data = $this->getRequestService()->getJournal();

        // Set the log entries
        $this->log = Log::create($data->getLogEntriesArray());
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