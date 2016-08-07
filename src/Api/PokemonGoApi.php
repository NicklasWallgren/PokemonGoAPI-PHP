<?php


namespace NicklasW\PkmGoApi\Api;

use NicklasW\PkmGoApi\Api\Map\Map;
use NicklasW\PkmGoApi\Api\Player\Inventory;
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
     * @var Map
     */
    protected $map;

    /**
     * Application constructor.
     *
     * @param string $user               The username or email
     * @param        $password           The password
     * @param        $authenticationType The authentication type
     */
    public function __construct($user, $password, $authenticationType)
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

        // Initialize the map instance
        $this->map = new Map($this);
    }

}