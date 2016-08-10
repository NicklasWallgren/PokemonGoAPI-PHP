<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshToken\Parsers;

use NicklasW\PkmGoApi\Authentication\Exceptions\AuthenticationException;
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
                'timestamp'     => time() + $content->expires_in,
            )
        );
    }

    /**
     * Validate the request response.
     *
     * @param ResponseInterface $response
     * @throws ResponseException
     */
    protected function validateResponse($response)
    {
        Log::debug(sprintf('[#%s] Validating response. Status code: \'%s\'', __CLASS__, $response->getStatusCode()));

        // Check if the response corresponds to a server error
        if (!$this->isServerError($response)) {
            return;
        }

        // Retrieve the response content
        $content = json_decode((string)$response->getBody());

        // Check if the token is already redeemed
        if ($this->isTokenAlreadyRedeemed($content)) {
            throw new AuthenticationException($content->error_description);
        }

        // Check if the token is invalid
        if ($this->isTokenInvalid($content)) {
            throw new AuthenticationException('Invalid token provided');
        }

        Log::debug(sprintf('[#%s] Retrieved a invalid response. Content: \'%s\'', __CLASS__, $response->getBody()));

        throw new ResponseException(
            sprintf('Retrieved a invalid response. Response: \'%s\'', (string)$response->getBody()));
    }

    /**
     * Check if the token provided is already redeemed.
     *
     * @param $content
     * @return boolean
     */
    protected function isTokenAlreadyRedeemed($content)
    {
        return $content->error_description === 'Code was already redeemed.';
    }

    /**
     * Check if the token provided was invalid.
     *
     * @param $content
     * @return boolean
     */
    protected function isTokenInvalid($content)
    {
        return $content->error_description === 'Bad Request';
    }


}