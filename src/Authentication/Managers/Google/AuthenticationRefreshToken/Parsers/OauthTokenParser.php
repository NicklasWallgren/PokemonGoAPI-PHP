<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshToken\Parsers;

use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshToken\Parsers\Results\AuthenticationTokenResult;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class OauthTokenParser extends Parser {

    /**
     * OauthTokenParser constructor.
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
     */
    public function parse($response)
    {
        // Validate the retrieved response
        $this->validateResponse($response);

        // Retrieve the content
        $content = (string)$response->getBody();

        // Decode the response content
        $content = json_decode($content);

        Log::debug(sprintf('[#%s] Retrieved response. Content: \'%s\'', __CLASS__, print_r($content, true)));


        return new AuthenticationTokenResult(
            array(
                'token'         => $content->id_token,
                'timestamp'     => $content->expires_in,
            )
        );
    }

}