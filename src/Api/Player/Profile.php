<?php

namespace NicklasW\PkmGoApi\Api\Player;

use NicklasW\PkmGoApi\Api\Player\Data\Profile\Avatar;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\Badge;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\ContactSettings;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\Currencies;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\DailyBonus;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\ProfileData;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\TutorialState;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\PlayerRequestService;

/**
 * @method void setCreationTime(string $creationTime)
 * @method void setUsername(string $username)
 * @method void setTeam(integer $team)
 * @method void setTutorialState(TutorialState $tutorialState)
 * @method void setAvatar(Avatar $avatar)
 * @method void setPokemonStorage(array $pokemonStorage)
 * @method void setItemStorage(array $itemStorage)
 * @method void setDailyBonus(DailyBonus $dailyBonus)
 * @method void setBadge(Badge $badge)
 * @method void setContactSettings(ContactSettings $state)
 * @method void setCurrencies(Currencies $currencies)

 * @method string getCreationTime()
 * @method string getUsername()
 * @method integer getTeam()
 * @method TutorialState getTutorialState()
 * @method Avatar getAvatar()
 * @method array getPokemonStorage()
 * @method array getItemStorage()
 * @method DailyBonus getDailyBonus()
 * @method Badge getBadge()
 * @method ContactSettings getContactSettings()
 * @method Currencies getCurrencies()
 */
class Profile extends Procedure {

    /**
     * Returns the profile data.
     *
     * @returns ProfileData
     */
    public function getData()
    {
        return parent::getData();
    }

    /**
     * Updates the player profile with the latest data.
     */
    public function update()
    {
        // Retrieves the player metadata
        $data = $this->getRequestService()->getPlayer();

        // Set the profile data
        $this->data = ProfileData::create($data->getPlayerData());
    }

    /**
     * Returns the request service.
     *
     * @return PlayerRequestService
     */
    protected function getRequestService()
    {
        return new PlayerRequestService();
    }

}