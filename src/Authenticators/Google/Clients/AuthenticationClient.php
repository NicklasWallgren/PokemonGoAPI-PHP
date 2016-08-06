<?php

namespace NicklasW\PkmGoApi\Authenticators\Google\Clients;

use GuzzleHttp\Cookie\CookieJar;
use NicklasW\PkmGoApi\Authenticators\Google\Parsers\AuthenticationInformationParser;
use NicklasW\PkmGoApi\Authenticators\Google\Parsers\OauthTokenParser;
use NicklasW\PkmGoApi\Authenticators\Google\Parsers\TokenParser;
use NicklasW\PkmGoApi\Authenticators\Google\Parsers\Results\AuthenticationTokenResult;
use NicklasW\PkmGoApi\Authenticators\Google\Support\Signature;
use NicklasW\PkmGoApi\Clients\Client;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class AuthenticationClient {

    /**
     * @var string The android authentication token url
     */
    protected static $URL_ANDROID_TOKEN_URL = 'https://android.clients.google.com/auth';

    /**
     * @var string The authentication token url
     */
    protected static $URL_TOKEN_URL = 'https://accounts.google.com/o/oauth2/token';

    /**
     * @var string The oauth login service
     */
    protected static $OAUTH_LOGIN_SERVICE = 'audience:server:client_id:848232511240-7so421jotr2609rmqakceuu1luuq0ptb.apps.googleusercontent.com';

    /**
     * @var string The oauth login application
     */
    protected static $OAUTH_LOGIN_APPLICATION = 'com.nianticlabs.pokemongo';

    /**
     * @var string The oauth login client signature
     */
    protected static $OAUTH_LOGIN_CLIENT_SIGNATURE = '321187995bc7cdc2b5fc91b11a96e2baa8602c62';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Returns the authentication token.
     *
     * @param string $email
     * @param string $password
     * @return AuthenticationTokenResult
     */
    public function getAuthenticationToken($email, $password)
    {
        // Retrieve the encrypted password
        $encryptedPassword = Signature::create($email, $password);

        $parameters = array(
            'accountType'     => 'HOSTED_OR_GOOGLE',
            'Email'           => $email,
            'has_permission'  => 1,
            'add_account'     => 1,
            'EncryptedPasswd' => $encryptedPassword,
            'service'         => 'ac2dm',
            'source'          => 'android',
            'device_country'  => 'us',
            'operatorCountry' => 'us',
            'lang'            => 'en',
            'sdk_version'     => '17',
        );

        // Retrieve the response
        $response = $this->post(self::$URL_ANDROID_TOKEN_URL,
            array('headers' => array('User-Agent' => 'gpsoauth/0.0.5'), 'form_params' => $parameters));

        // Get the authentication token parser
        $parser = new TokenParser();

        // Parse the content
        return $parser->parse($response);
    }

    /**
     * Retrieves the the oauth token using user credentials.
     *
     * @param string $email
     * @param string $token
     * @return AuthenticationTokenResult
     */
    public function getOauthTokenByUserCredentials($email, $token)
    {
        $parameters = array(
            'accountType'     => 'HOSTED_OR_GOOGLE',
            'Email'           => $email,
            'has_permission'  => 1,
            'EncryptedPasswd' => $token,
            'service'         => self::$OAUTH_LOGIN_SERVICE,
            'source'          => 'android',
            'app'             => self::$OAUTH_LOGIN_APPLICATION,
            'client_sig'      => self::$OAUTH_LOGIN_CLIENT_SIGNATURE,
            'device_country'  => 'us',
            'operatorCountry' => 'us',
            'lang'            => 'en',
            'sdk_version'     => '17',
        );

        // Retrieve the response
        $response = $this->post(self::$URL_ANDROID_TOKEN_URL,
            array('headers' => array('User-Agent' => 'gpsoauth/0.0.5'), 'form_params' => $parameters));

        // Get the authentication token parser
        $parser = new OauthTokenParser();

        // Parse the content
        return $parser->parse($response);
    }

    /**
     * Retrieves the the oauth token using authentication code.
     *
     * @param string $authenticationCode
     * @return AuthenticationTokenResult
     */
    public function getOauthTokenByAuthenticationCode($authenticationCode)
    {
        $parameters = array(
            'client_id'     => '848232511240-73ri3t7plvk96pj4f85uj8otdat2alem.apps.googleusercontent.com',
            'client_secret' => 'NCjF1TLi2CcY6t5mt0ZveuL7',
            'code'          => $authenticationCode,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => 'urn:ietf:wg:oauth:2.0:oob',
            'scope'         => 'openid email https://www.googleapis.com/auth/userinfo.email',
        );

        // Retrieve the content
        $response = $this->post(self::$URL_TOKEN_URL, array('form_params' => $parameters));

        // Parse the response.

        


    }

    /**
     * Execute a GET request and returns the response content.
     *
     * @param string $url
     * @return string
     */
    protected function content($url)
    {
        // Execute the GET request
        $response = $this->client()->get($url);

        // Retrieve the content
        return (string)$response->getBody();
    }

    /**
     * Execute a GET request and returns the response content.
     *
     * @param string $url
     * @param array  $parameters
     * @return ResponseInterface
     */
    protected function get($url, $parameters = array())
    {
        // Execute the GET request
        $response = $this->client()->get($url, $parameters);

        // Retrieve the content
        return $response;
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
        if ($this->client == null) {
            $this->client = new Client(array('cookies' => new CookieJar()));
        }

        return $this->client;
    }

}