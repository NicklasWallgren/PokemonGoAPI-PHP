<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Enums\PokemonId;
use POGOProtos\Enums\PokemonMove;
use POGOProtos\Inventory\InventoryDelta;
use POGOProtos\Inventory\InventoryItem;
use POGOProtos\Inventory\InventoryItemData;
use Protobuf\Exception;

/**
 * @method void setId(int $id)
 * @method void setPokemonId(int $pokemonId)
 * @method void setCp(int $cp)
 * @method void setStamina(int $stamina)
 * @method void setStaminaMax(int $staminaMax)
 * @method void setMove1(int $move1)
 * @method void setMove2(int $move2)
 * @method void setDeployedFortId(int $deployedFortId)
 * @method void setOwnerName(string $ownerName)
 * @method void setIsEgg(boolean $isEgg)
 * @method void setEggKmWalkedTarget(int $eggKmWalkedTarget)
 * @method void setEggKmWalkedStart(int $eggKmWalkedStart)
 * @method void setOrigin(int $origin)
 * @method void setHeightM(int $heightM)
 * @method void setWeightKg(int $weightKg)
 * @method void setIndividualAttack(int $individualAttack)
 * @method void setIndividualDefense(int $individualDefense)
 * @method void setIndividualStamina(int $individualStamina)
 * @method void setCpMultiplier(int $cpMultiplier)
 * @method void setPokeball(int $pokeball)
 * @method void setCapturedCellId(int $capturedCellId)
 * @method void setBattlesAttacked(int $battlesAttacked)
 * @method void setBattlesDefended(int $battlesDefended)
 * @method void setEggIncubatorId(string $eggIncubatorId)
 * @method void setCreationTimeMs(int $creationTimeMs)
 * @method void setNumUpgrades(int $numUpgrades)
 * @method void setAdditionalCpMultiplier(int $additionalCpMultiplier)
 * @method void setFavorite(int $favorite)
 * @method void setNickname(string $nickname)
 * @method void setFromFort(int $fromFort)
 *
 * @method int getId()
 * @method int getPokemonId()
 * @method int getCp()
 * @method int getStamina()
 * @method int getStaminaMax()
 * @method int getMove1()
 * @method int getMove2()
 * @method int getDeployedFortId()
 * @method string getOwnerName()
 * @method boolean getIsEgg()
 * @method int getEggKmWalkedTarget()
 * @method int getEggKmWalkedStart()
 * @method int getOrigin()
 * @method int getHeightM()
 * @method int getWeightKg()
 * @method int getIndividualAttack()
 * @method int getIndividualDefense()
 * @method int getIndividualStamina()
 * @method int getCpMultiplier()
 * @method int getPokeball()
 * @method int getCapturedCellId()
 * @method int getBattlesAttacked()
 * @method int getBattlesDefended()
 * @method string getEggIncubatorId()
 * @method int getCreationTimeMs()
 * @method int getNumUpgrades()
 * @method int getAdditionalCpMultiplier()
 * @method int getFavorite()
 * @method string getNickname()
 * @method int getFromFort()
 */
class PokemonItem extends Data {

    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $pokemonId = PokemonId::MISSINGNO;

    /**
     * @var int
     */
    protected $cp = 0;

    /**
     * @var int
     */
    protected $stamina = 0;

    /**
     * @var int
     */
    protected $staminaMax = 0;

    /**
     * @var int
     */
    protected $move1 = PokemonMove::MOVE_UNSET;

    /**
     * @var int
     */
    protected $move2 = PokemonMove::MOVE_UNSET;

    /**
     * @var int
     */
    protected $deployedFortId = 0;

    /**
     * @var string
     */
    protected $ownerName = "";

    /**
     * @var bool
     */
    protected $isEgg = false;

    /**
     * @var int
     */
    protected $eggKmWalkedTarget = 0;

    /**
     * @var int
     */
    protected $eggKmWalkedStart = 0;

    /**
     * @var int
     */
    protected $origin = 0;

    /**
     * @var int
     */
    protected $heightM = 0;

    /**
     * @var int
     */
    protected $weightKg = 0;

    /**
     * @var int
     */
    protected $individualAttack = 0;

    /**
     * @var int
     */
    protected $individualDefense = 0;

    /**
     * @var int
     */
    protected $individualStamina = 0;

    /**
     * @var int
     */
    protected $cpMultiplier = 0;

    /**
     * @var int
     */
    protected $pokeball = 0;

    /**
     * @var int
     */
    protected $capturedCellId = 0;

    /**
     * @var int
     */
    protected $battlesAttacked = 0;

    /**
     * @var int
     */
    protected $battlesDefended = 0;

    /**
     * @var string
     */
    protected $eggIncubatorId = "";

    /**
     * @var int
     */
    protected $creationTimeMs = 0;

    /**
     * @var int
     */
    protected $numUpgrades = 0;

    /**
     * @var int
     */
    protected $additionalCpMultiplier = 0;

    /**
     * @var int
     */
    protected $favorite = 0;

    /**
     * @var string
     */
    protected $nickname = "";

    /**
     * @var int
     */
    protected $fromFort = 0;
    
}