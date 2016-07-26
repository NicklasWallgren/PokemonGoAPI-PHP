<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\AccountLoginInformationParser;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\AuthenticationConfirmationInformationParser;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\AuthenticationInformationParser;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\AuthenticationCodeParser;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AccountInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationConfirmationInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationInformationResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationCodeResult;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationTokenResult;
use PHPHtmlParser\Dom;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthenticationClient {

    /**
     * @var string The authentication information url
     */
    protected static $URL_AUTHENTICATION_INFORMATION = 'https://accounts.google.com/o/oauth2/auth?client_id=848232511240-73ri3t7plvk96pj4f85uj8otdat2alem.apps.googleusercontent.com&redirect_uri=urn%3Aietf%3Awg%3Aoauth%3A2.0%3Aoob&response_type=code&scope=openid%20email%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email';

    /**
     * @var string The account login info url
     */
    protected static $URL_ACCOUNT_LOGIN_INFORMATION = 'https://accounts.google.com/AccountLoginInfo';

    /**
     * @var string The password challenge url
     */
    protected static $URL_PASSWORD_CHALLENGE_URL = 'https://accounts.google.com/signin/challenge/sl/password';

    /**
     * @var string The authentication token url
     */
    protected static $URL_TOKEN_URL = 'https://accounts.google.com/o/oauth2/token';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Returns the authentication information.
     *
     * @returns AuthenticationInformationResult
     */
    public function authenticationInformation()
    {
        // Retrieve the content.
        $content = $this->content(self::$URL_AUTHENTICATION_INFORMATION);

        // Get the authentication information parser
        $parser = new AuthenticationInformationParser(new Dom());

        // Parse the content
        return $parser->parse($content);
    }

    /**
     * Returns the account information.
     *
     * @param string $galx
     * @param string $gxf
     * @param string $continue
     * @param string $email
     * @return AccountInformationResult
     */
    public function accountInformation($galx, $gxf, $continue, $email)
    {

        // The parameters to be posted
        $parameters = array(
            'Page'               => 'PasswordSeparationSignIn',
            'GALX'               => $galx,
            'gxf'                => $gxf,
            'continue'           => $continue,
            'ltmpl'              => 'embedded',
            'scc'                => '1',
            'sarp'               => '1',
            'oauth'              => '1',
            'ProfileInformation' => '',
            '_utf8'              => '?',
            'bgresponse'         => 'js_disabled',
            'Email'              => $email,
            'signIn'             => 'Next',
        );

        // Retrieve the response
        $response = $this->post(self::$URL_ACCOUNT_LOGIN_INFORMATION, array('form_params' => $parameters));

        // Get the authentication information parser
        $parser = new AccountLoginInformationParser(new Dom());

        // Parse the content
        return $parser->parse($response->getBody()->getContents());
    }

    /**
     * Returns the authentication confirmation information.
     *
     * @param string $galx
     * @param string $gxf
     * @param string $continue
     * @param string $profileId
     * @param string $email
     * @param string $password
     * @return AuthenticationConfirmationInformationResult
     */
    public function authenticationConfirmationInformation($galx, $gxf, $continue, $profileId, $email, $password)
    {
        $parameters = array(
            'Page'               => 'PasswordSeparationSignIn',
            'GALX'               => $galx,
            'gxf'                => $gxf,
            'continue'           => $continue,
            'ltmpl'              => 'embedded',
            'scc'                => '1',
            'sarp'               => '1',
            'oauth'              => '1',
            'ProfileInformation' => $profileId,
            '_utf8'              => '?',
            'bgresponse'         => 'js_disabled',
            'Email'              => $email,
            'Passwd'             => $password,
            'signIn'             => 'Sign in',
            'PersistentCookie'   => 'yes',
            'response_type'      => 'access_token',
            'acu'                => '1',
            'ignoreShadow'       => 0,
            'checkedDomains'     => 'youtube',
            'checkConnection'    => '',
            'pstMsg'             => '0',
            'dnConn'             => '',

        );

        // Retrieve the content
        $response = $this->post(self::$URL_PASSWORD_CHALLENGE_URL, array('form_params' => $parameters));

        // Get the authentication confirmation information parser
        $parser = new AuthenticationConfirmationInformationParser(new Dom());

        // Parse the content
        return $parser->parse($response->getBody()->getContents());
    }


    /**
     * Returns the authentication code.
     *
     * @param string $stateWrapperId
     * @param string $approveUrl
     * @return AuthenticationCodeResult
     */
    public function code($stateWrapperId, $approveUrl)
    {
        // Remove and strip unwanted chars
        $approveUrl = str_replace('amp;', '', $approveUrl);

        $parameters = array(
            '_utf8'         => '?',
            'bgresponse'    => 'js_disabled',
            'state_wrapper' => $stateWrapperId,
            'submit_access' => 'true',
        );

        // Retrieve the content
        $response = $this->post($approveUrl, array('form_params' => $parameters));

        // Get the authentication code parser
        $parser = new AuthenticationCodeParser(new Dom());

        // Parse the content
        return $parser->parse($response->getBody()->getContents());
    }

    /**
     * Returns the authentication token.
     *
     * @param string $code
     * @return AuthenticationTokenResult
     */
    public function token($code)
    {
        $parameters = array(
            'client_id'     => '848232511240-73ri3t7plvk96pj4f85uj8otdat2alem.apps.googleusercontent.com',
            'client_secret' => 'NCjF1TLi2CcY6t5mt0ZveuL7',
            'code'          => $code,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => 'urn:ietf:wg:oauth:2.0:oob',
            'scope'         => 'openid email https://www.googleapis.com/auth/userinfo.email',
        );

        // Retrieve the content
        $response = $this->post(self::$URL_TOKEN_URL, array('form_params' => $parameters));

        return new AuthenticationTokenResult(json_decode($response->getBody()->getContents()));
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
     * Returns a Request Middleware which manipulates the request URI.
     *
     * @return \Closure
     */
    protected function queryRequestMiddleware()
    {
        return function (RequestInterface $request) {
            // Retrieve the uri
            $uri = $request->getUri();

            // Remove and strip unwanted chars
            $query = str_replace('amp%3B', '', $uri->getQuery());

            // Update the URI query
            $uri = $uri->withQuery($query);

            return $request->withUri($uri);
        };
    }

    /**
     * Returns the Client.
     *
     * @return Client
     */
    protected function client()
    {
        if ($this->client == null) {
            $stack = HandlerStack::create();

            // Apply request query middleware
            $stack->push(Middleware::mapRequest($this->queryRequestMiddleware()));

            $this->client = new Client(array('cookies' => new CookieJar(), 'http_errors' => false, 'handler' => $stack));
        }

        return $this->client;
    }

}