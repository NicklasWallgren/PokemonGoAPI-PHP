<?php

/**
 * @author DrDelay <info@vi0lation.de>
 */

namespace NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Parsers;

use NicklasW\PkmGoApi\Authenticators\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Authenticators\Exceptions\ResponseException;
use NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Parsers\Results\GoogleOAuthResult;
use Psr\Http\Message\ResponseInterface;
use function GuzzleHttp\json_decode;

class GoogleOAuthParser
{
    /**
     * Parses a Google OAuth response.
     *
     * @param ResponseInterface $response
     *
     * @return GoogleOAuthResult
     *
     * @throws AuthenticationException
     * @throws ResponseException
     */
    public static function parse(ResponseInterface $response)
    {
        $data = json_decode($response->getBody());
        $status = $response->getStatusCode();

        if ($status != 200) {
            throw new AuthenticationException(isset($data->error_description) ? $data->error_description : 'Auth failed', $status);
        }

        if (!(isset($data->id_token) && isset($data->expires_in))) {
            throw new ResponseException('Incomplete response from Google');
        }

        return new GoogleOAuthResult($data->id_token, (int) $data->expires_in, isset($data->refresh_token) ? $data->refresh_token : null);
    }
}
