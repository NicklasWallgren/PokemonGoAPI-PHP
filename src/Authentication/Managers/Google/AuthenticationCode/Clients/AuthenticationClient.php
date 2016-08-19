<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Clients;

use GuzzleHttp\Client;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Parsers\OauthTokenParser;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Parsers\Results\AuthenticationTokenResult;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class AuthenticationClient {

    /**
     * @var string The authentication token url
     */
    protected static $URL_TOKEN_URL = 'https://www.googleapis.com/oauth2/v4/token';

    /**
     * @var string The client id parameter
     */
    protected static $PARAMETER_CLIENT_ID = '848232511240-73ri3t7plvk96pj4f85uj8otdat2alem.apps.googleusercontent.com';

    /**
     * @var string The client secret parameter
     */
    protected static $PARAMETER_CLIENT_SECRET= 'NCjF1TLi2CcY6t5mt0ZveuL7';

    /**
     * @var string The grant type parameter
     */
    protected static $PARAMETER_GRANT_TYPE = 'authorization_code';

    /**
     * @var string The redirect uri parameter
     */
    protected static $PARAMETER_REDIRECT_URI = 'urn:ietf:wg:oauth:2.0:oob';

    /**
     * @var string The scope parameter
     */
    protected static $PARAMETER_SCOPE = 'openid email https://www.googleapis.com/auth/userinfo.email';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Retrieves the the oauth token using authentication code.
     *
     * @param string $authenticationCode
     * @return AuthenticationTokenResult
     */
    public function getOauthTokenByAuthenticationCode($authenticationCode)
    {
        $parameters = array(
            'client_id'     => self::$PARAMETER_CLIENT_ID,
            'client_secret' => self::$PARAMETER_CLIENT_SECRET,
            'code'          => $authenticationCode,
            'grant_type'    => self::$PARAMETER_GRANT_TYPE,
            'redirect_uri'  => self::$PARAMETER_REDIRECT_URI,
        );

        // Retrieve the content
        $response = $this->post(self::$URL_TOKEN_URL, array('form_params' => $parameters));

        // Get the authentication token parser
        $parser = new OauthTokenParser();

        // Parse the content
        return $parser->parse($response);
    }

    /**
     * Execute a POST request and returns the response content.
     *
     * @param string $url
     * @param array  $parameters
     * @return ResponseInterface
     */
    protected function post($url, $parameters = array())
    {
        // Execute the POST request
        $response = $this->client()->post($url, $parameters);

        // Retrieve the content
        return $response;
    }

    /**
     * Returns the Client.
     *
     * @return Client
     */
    protected function client()
    {
        return App::get('client');
    }

}