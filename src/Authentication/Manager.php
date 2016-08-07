<?php

namespace NicklasW\PkmGoApi\Authentication;

use Closure;
use NicklasW\PkmGoApi\Authentication\AccessToken;

abstract class Manager {

    /**
     * @var integer The access token event
     */
    const EVENT_ACCESS_TOKEN = 0;

    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    abstract public function getAccessToken();

    /**
     * Returns the identifier.
     *
     * @return string
     */
    abstract public function getIdentifier();

    /**
     * Adds a listener to the list of listeners
     *
     * @param Closure $listener
     */
    public function addListener(Closure $listener)
    {
        $this->listeners[] = $listener;
    }

    /**
     * Dispatch a event to the listeners
     *
     * @param int   $event
     * @param mixed $data
     */
    public function dispatchEvent($event, $data)
    {
        // Iterate through the list of listeners
        foreach ($this->listeners as $listener) {
            // Dispatch the event to the listener
            $listener($event, $data);
        }
    }

}