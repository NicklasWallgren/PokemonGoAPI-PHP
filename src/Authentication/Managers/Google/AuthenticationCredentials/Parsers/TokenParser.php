<?php

namespace NicklasW\PkmGoApi\Managers\Google\AuthenticationCredentials\Parsers;

use NicklasW\PkmGoApi\Authenticators\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Authenticators\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Authenticators\Google\AuthenticationCredentials\Parsers\Results\AuthenticationTokenResult;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class TokenParser extends Parser {

    /**
     * TokenParser constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The method which parses the page.
     *
     * @param ResponseInterface $response
     * @return AuthenticationTokenResult
     * @throws AuthenticationException
     * @throws ResponseException
     */
    public function parse($response)
    {
        // Validate the retrieved response
        $this->validateResponse($response);

        // Retrieve the content
        $content = (string)$response->getBody();

        // Check if we provided valid user credentials
        if ($response->getStatusCode() === self::$RESPONSE_STATUS_FORBIDDEN) {
            Log::debug(sprintf('[#%s] Retrieved invalid response. Content: \'%s\' Status code: \'%s\' ',
                __CLASS__, $content, $response->getStatusCode()));

            throw new AuthenticationException(
                sprintf('Invalid user credentials. Response: \'%s\'', $content));
        }

        Log::debug(sprintf('[#%s] Response content: \'%s\'', __CLASS__, $content));

        return new AuthenticationTokenResult(array('token' => $this->parseToken($content)));
    }

    /**
     * Returns the parsed ticket.
     *
     * @param string $content
     * @return string mixed
     */
    protected function parseToken($content)
    {
        $matches = array();

        preg_match('/Token=(?<token>.*)/', $content, $matches);

        return $matches['token'];
    }

}