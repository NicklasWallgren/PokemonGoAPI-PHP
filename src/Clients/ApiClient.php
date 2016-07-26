<?php

namespace NicklasW\PkmGoApi\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use NicklasW\PkmGoApi\Parsers\Results\AuthenticationInformationResult;
use PHPHtmlParser\Dom;
use POGOProtos\Networking\Envelopes_RequestEnvelope;
use POGOProtos\Networking\Envelopes_RequestEnvelope_AuthInfo;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiClient {

    /**
     * @var string The API url
     */
    protected static $URL_API = 'https://pgorelease.nianticlabs.com/plfe/rpc';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Returns the endpoint url.
     *
     * @returns AuthenticationInformationResult
     */
    public function endpoint()
    {


    }

    public function profile($token)
    {
        



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