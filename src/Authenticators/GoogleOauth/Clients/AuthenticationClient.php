<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\AuthenticationInformationParser;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\OauthTokenParser;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\TokenParser;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationTokenResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Support\Signature;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class AuthenticationClient {


    /**
     * @var string The authentication token url
     */
    protected static $URL_TOKEN_URL = 'https://android.clients.google.com/auth';

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
    public function token($email, $password)
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
        $response = $this->post(self::$URL_TOKEN_URL,
            array('headers' => array('User-Agent' => 'gpsoauth/0.0.5'), 'form_params' => $parameters));

        // Get the authentication token parser
        $parser = new TokenParser();

        // Parse the content
        return $parser->parse($response);
    }

    /**
     * Returns the oauth token.
     *
     * @param string $email
     * @param string $token
     * @return AuthenticationTokenResult
     */
    public function oauthToken($email, $token)
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
        $response = $this->post(self::$URL_TOKEN_URL,
            array('headers' => array('User-Agent' => 'gpsoauth/0.0.5'), 'form_params' => $parameters));

        // Get the authentication token parser
        $parser = new OauthTokenParser();

        // Parse the content
        return $parser->parse($response);
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
        return $response->getBody()->getContents();
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
            $this->client = new Client(
                array('cookies' => new CookieJar(), 'http_errors' => false, 'verify' => Config::get('config.ssl_verification')));
        }

        return $this->client;
    }

}