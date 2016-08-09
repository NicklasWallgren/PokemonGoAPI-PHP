<?php

namespace NicklasW\PkmGoApi\Clients;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use NicklasW\PkmGoApi\Facades\Config;
use NicklasW\PkmGoApi\Facades\Log;
use PHPHtmlParser\Dom;
use POGOProtos\Networking\Envelopes_RequestEnvelope;
use POGOProtos\Networking\Envelopes_RequestEnvelope_AuthInfo;

class Client extends GuzzleClient {

    /**
     * @var string The logger message format
     */
    protected static $LOGGER_MESSAGE_FORMAT = "\nRequest: %1$1 {request} \nResponse: {response} \nError: {error} \n";

    /**
     * Clients accept an array of constructor parameters.
     * Here's an example of creating a client using a base_uri and an array of
     * default request options to apply to each request:
     *     $client = new Client([
     *         'base_uri'        => 'http://www.foo.com/1.0/',
     *         'timeout'         => 0,
     *         'allow_redirects' => false,
     *         'proxy'           => '192.168.16.1:10'
     *     ]);
     * Client configuration settings include the following options:
     * - handler: (callable) Function that transfers HTTP requests over the
     *   wire. The function is called with a Psr7\Http\Message\RequestInterface
     *   and array of transfer options, and must return a
     *   GuzzleHttp\Promise\PromiseInterface that is fulfilled with a
     *   Psr7\Http\Message\ResponseInterface on success. "handler" is a
     *   constructor only option that cannot be overridden in per/request
     *   options. If no handler is provided, a default handler will be created
     *   that enables all of the request options below by attaching all of the
     *   default middleware to the handler.
     * - base_uri: (string|UriInterface) Base URI of the client that is merged
     *   into relative URIs. Can be a string or instance of UriInterface.
     * - **: any request option
     *
     * @param array $config Client configuration settings.
     * @see \GuzzleHttp\RequestOptions for a list of available request options.
     */
    public function __construct($config = array())
    {
        parent::__construct(array_merge($this->configuration(), $config));
    }

    /**
     * Returns the default configuration.
     *
     * @return array
     */
    protected function configuration()
    {
        // Create a handler stack instance
        $stack = HandlerStack::create();

        // Create a middlware for logging
        $stack->unshift(Middleware::log(Log::getInstance(), new MessageFormatter(self::$LOGGER_MESSAGE_FORMAT)));

        return array(
            'http_errors' => false,
            'handler' => $stack,
            'verify' => Config::get('config.ssl_verification'),
            'proxy' => Config::get('config.proxy'),
        );
    }

}