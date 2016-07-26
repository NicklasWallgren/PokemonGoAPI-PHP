<?php

namespace NicklasW\PkmGoApi\Api\Player;

use NicklasW\PkmGoApi\Api\Player\Data\Profile\ProfileData;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\PlayerRequestService;

class Profile extends Procedure {

    /**
     * @var ProfileData
     */
    protected $profileData;

    /**
     * Returns the profile data.
     *
     * @returns ProfileData
     */
    public function getProfileData()
    {
        // Check if the profile data is available since earlier
        if ($this->profileData === null) {
            $this->update();
        }

        return $this->profileData;
    }

    /**
     * Updates the player profile with the latest data.
     */
    public function update()
    {
        // Retrieves the player metadata
        $data = $this->getRequestService()->getPlayer();

        // Set the profile data
        $this->profileData = ProfileData::create($data->getPlayerData());
    }

    /**
     * Returns the request service.
     *
     * @return RequestService
     */
    protected function getRequestService()
    {
        return new PlayerRequestService();
    }

}