<?php

namespace NicklasW\PkmGoApi\Authenticators\PTC\Clients;

use GuzzleHttp\Cookie\CookieJar;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\AuthenticationInformationParser;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\TicketResult;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\Results\TokenResult;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\TicketParser;
use NicklasW\PkmGoApi\Authenticators\PTC\Parsers\TokenParser;
use NicklasW\PkmGoApi\Clients\Client;
use PHPHtmlParser\Dom;
use Psr\Http\Message\ResponseInterface;

class AuthenticationClient {

    /**
     * @var string The login endpoint url
     */
    protected static $URL_ENDPOINT_LOGIN = 'https://sso.pokemon.com/sso/login?service=https%3A%2F%2Fsso.pokemon.com%2Fsso%2Foauth2.0%2FcallbackAuthorize';

    /**
     * @var string The oauth endpoint url
     */
    protected static $URL_ENDPOINT_OAUTH = 'https://sso.pokemon.com/sso/oauth2.0/accessToken';

    /**
     * @var string The client secret
     */
    protected static $CLIENT_SECRET = 'w8ScCUXJQc6kXKw8FiOhd8Fixzht18Dq3PEVkUCP5ZPxtgyWsbTvWHFLm2wNY0JR';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Returns the authentication information.
     *
     * @return AuthenticationInformationResult
     */
    public function authenticationInformation()
    {
        // Retrieve the response
        $response = $this->get(self::$URL_ENDPOINT_LOGIN, array('headers' => array('User-Agent' => 'niantic')));

        // Get the authentication information parser
        $parser = new AuthenticationInformationParser();

        // Parse the content
        return $parser->parse($response);
    }

    /**
     * Returns the authentication ticket.
     *
     * @param string                          $username
     * @param string                          $password
     * @param AuthenticationInformationResult $authenticationInformation
     * @return TicketResult
     */
    public function ticket($username, $password, $authenticationInformation)
    {
        $parameters = array(
            'lt'        => $authenticationInformation->getLtCode(),
            'execution' => $authenticationInformation->getExecutionCode(),
            '_eventId'  => 'submit',
            'username'  => $username,
            'password'  => $password,
            'Login'     => 'Sign In',
        );

        // Retrieve the content.
        $response = $this->post(self::$URL_ENDPOINT_LOGIN,
            array('headers' => array('User-Agent' => 'niantic'), 'form_params' => $parameters, 'allow_redirects' => false));

        // Get the authentication ticket parser
        $parser = new TicketParser();

        // Parse the content
        return $parser->parse($response);
    }

    /**
     * Returns the authentication token.
     *
     * @param string $ticket
     * @return TokenResult
     */
    public function token($ticket)
    {
        $parameters = array(
            'client_id'     => 'mobile-app_pokemon-go',
            'redirect_uri'  => 'https://www.nianticlabs.com/pokemongo/error',
            'client_secret' => self::$CLIENT_SECRET,
            'grant_type'    => 'refresh_token',
            'code'          => $ticket,
        );

        // Retrieve the content.
        $content = $this->post(self::$URL_ENDPOINT_OAUTH, array('form_params' => $parameters));

        // Get the authentication ticket parser
        $parser = new TokenParser();

        // Parse the content
        return $parser->parse($content);
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
            $this->client = new Client(array('cookies' => new CookieJar()));
        }

        return $this->client;
    }

}