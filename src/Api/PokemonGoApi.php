<?php

namespace NicklasW\PkmGoApi\Api;

use NicklasW\PkmGoApi\Api\Map\Map;
use NicklasW\PkmGoApi\Api\Player\Inventory;
use NicklasW\PkmGoApi\Api\Player\Journal;
use NicklasW\PkmGoApi\Api\Player\Profile;
use NicklasW\PkmGoApi\Services\RequestService;

class PokemonGoApi {

    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var Inventory
     */
    protected $inventory;

    /**
     * @var Profile
     */
    protected $profile;

    /**
     * @var Journal
     */
    protected $journal;

    /**
     * @var Map
     */
    protected $map;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        // Initial the Request Service
        $this->requestService = new RequestService();

        // Initialize the prerequisites
        $this->initialize();
    }

    /**
     * Returns the player inventory.
     *
     * @return Inventory
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Returns the player profile.
     *
     * @return Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return Journal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Returns the map.
     *
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @return RequestService
     */
    public function getRequestService()
    {
        return $this->requestService;
    }

    /**
     * Initialize the prerequisites.
     */
    protected function initialize()
    {
        // Initialize the inventory instance
        $this->inventory = new Inventory($this);

        // Initialize the profile instance
        $this->profile = new Profile($this);

        // Initialize the journal instance
        $this->journal = new Journal($this);

        // Initialize the map instance
        $this->map = new Map($this);
    }

}