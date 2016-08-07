<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\Parsers;

use NicklasW\PkmGoApi\Authenticators\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Authentication\Managers\PTC\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class AuthenticationInformationParser extends Parser {

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
     * @param ResponseInterface $response
     * @return AuthenticationInformationResult
     * @throws ResponseException
     */
    public function parse($response)
    {
        // Validate the retrieved response
        $this->validateResponse($response);

        // Retrieve the content
        $content = (string)$response->getBody();

        // Decode the content
        $content = $this->content($content);

        Log::debug(sprintf('[#%s] Retrieved content: \'%s\' ', __CLASS__, var_export($content, true)));

        return new AuthenticationInformationResult(array('lt' => $content->lt, 'execution' => $content->execution));
    }

    /**
     * Returns the content.
     *
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function content($response)
    {
        return json_decode($response);
    }

}