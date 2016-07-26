<?php


namespace NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results;

class TicketResult {

    /**
     * @var The parsed data
     */
    protected $data;

    /**
     * Result constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return The parsed data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param The parsed data $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

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