<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Parsers;

use NicklasW\PkmGoApi\Authentication\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Parsers\Results\TokenResult;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class TokenParser extends Parser {

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
     * @return TokenResult
     */
    public function parse($response)
    {
        // Retrieve the content
        $content = $response->getBody();
        
        // Check if the response includes any error messages
        if (array_key_exists('error', $content)) {
            // Retrieve the error messages
            $errors = $content['error'];

            // Check if there are any available error messages
            if (sizeof($errors) > 0) {
                Log::debug(sprintf('[#%s] Error messages in response. Errors: \'%s\'', __CLASS__,
                    print_r($errors, true)));
                // A code of 498 indicates an expired or otherwise invalid token. 0 is default
                $code = in_array("invalid_grant", $errors) ? AuthenticationException::PTC_INVALID_GRANT_ERROR : 0;
                throw new AuthenticationException(current($errors),$code);
            }
        }

        Log::debug(sprintf('[#%s] Retrieved content: \'%s\'', __CLASS__, $content));

        $content = (string)$content;
        return new TokenResult(
            array('token' => $this->parseToken($content), 'timestamp' => $this->parseExpiresTimestamp($content)));
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

        preg_match('/access_token=(?<token>.*)&expires/', $content, $matches);

        return $matches['token'];
    }

    /**
     * Returns the parsed ticket.
     *
     * @param string $content
     * @return string mixed
     */
    protected function parseExpiresTimestamp($content)
    {
        $matches = array();

        preg_match('/expires=(?<expires>.*)/', $content, $matches);

        return time() + intval($matches['expires']);
    }

}