<?php


namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\Parsers\Results;

class TicketResult extends Result {

    /**
     * Returns the ticket.
     *
     * @return mixed
     */
    public function getTicket()
    {
        return $this->data['ticket'];
    }

}