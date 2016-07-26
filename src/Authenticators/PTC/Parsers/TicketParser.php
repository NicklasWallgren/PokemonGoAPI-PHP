<?php

namespace NicklasW\PkmGoApi\Authenticators\PTC\Parsers;

use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\TicketResult;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class TicketParser extends Parser {

    /**
     * Authenticate constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The method which parses the content.
     *
     * @param ResponseInterface $content
     * @return AuthenticationInformationResult
     */
    public function parse($content)
    {
        // Retrieves the location header
        $location = current($content->getHeader('Location'));

        return new TicketResult(array('ticket' => $this->parseTicket($location)));
    }

    /**
     * Returns the parsed ticket.
     *
     * @param string $location
     * @return string mixed
     */
    protected function parseTicket($location)
    {
        return substr($location, strpos($location, '=') + 1);
    }

}