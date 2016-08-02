<?php

namespace NicklasW\PkmGoApi\Api\Pokemon;

use Exception;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\CandyBank;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\CandyItem;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokeBank;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Pokedex;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokedexItem;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokemonItem;
use NicklasW\PkmGoApi\Api\Player\Inventory;
use NicklasW\PkmGoApi\Api\Pokemon\Support\BasePokemonRetriever;
use NicklasW\PkmGoApi\Api\Pokemon\Support\CombatPointsCalculator;
use NicklasW\PkmGoApi\Api\Pokemon\Support\PokemonCombatPointsCalculator;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Api\Support\MakeDataPropertiesCallable;
use NicklasW\PkmGoApi\Services\Request\PokemonRequestService;
use POGOProtos\Enums\PokemonId;
use POGOProtos\Networking\Responses\EvolvePokemonResponse_Result;
use POGOProtos\Networking\Responses\NicknamePokemonResponse_Result;
use POGOProtos\Networking\Responses\ReleasePokemonResponse_Result;

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
class Pokemon extends Procedure {

    use MakeDataPropertiesCallable;

    /**
     * @var PokemonItem
     */
    protected $data;

    /**
     * @var float The calculated level
     */
    protected $level;

    /**
     * @var string The pokemon name.
     */
    protected $name;

    /**
     * @var double The IV ratio.
     */
    protected $ivRatio;

    /**
     * @var integer The pokemon family id
     */
    protected $pokemonFamilyId;

    /**
     * Pokemon constructor.
     *
     * @param array $pokemonData
     */
    public function __construct($pokemonData)
    {
        $this->data = $pokemonData;

        // Initialize the transient values
        $this->initializeTransientValues();
    }

    /**
     * Returns the pokemon data.
     *
     * @return PokemonItem
     */
    public function getPokemonData()
    {
        return $this->data;
    }

    /**
     * Returns the pokemon name.
     *
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the level.
     *
     * @return float
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return float
     */
    public function getIvRatio()
    {
        return $this->ivRatio;
    }

    /**
     * Returns the number of candies.
     *
     * @return CandyItem
     */
    public function getCandies()
    {
        return $this->getCandyBank()->get($this->pokemonFamilyId);
    }

    /**
     * Returns the pokedex entry.
     *
     * @return PokedexItem
     */
    public function getPokedexEntry()
    {
        return $this->getPokedex()->get($this->getPokemonId());
    }

    /**
     * Transfers the pokemon.
     */
    public function transfer()
    {
        // Execute the API request
        $response = $this->getRequestService()->transfer($this->getPokemonData()->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== ReleasePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon transfer. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), ReleasePokemonResponse_Result::toString($response->getResult())));
        }

        // Retrieve the poke bank
        $pokeBank = $this->getPokeBank();

        // Remove the pokemon from the poke bank
        $pokeBank->removePokemon($this);
    }

    /**
     * Renames the pokemon.
     *
     * @param string $name
     * @throws Exception
     */
    public function rename($name)
    {
        // Execute the API request
        $response = $this->getRequestService()->rename($this->getPokemonData()->getId(), $name);

        // Check if the request was successfully executed
        if ($response->getResult() !== NicknamePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon rename. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), NicknamePokemonResponse_Result::toString($response->getResult())));
        }

        // Update the pokemon name
        $this->data->setNickname($name);
    }

    /**
     * Evolves the pokemon.
     */
    public function evolve()
    {
        // Execute the API request
        $response = $this->getRequestService()->envolve($this->getPokemonData()->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== EvolvePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon evolve. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), EvolvePokemonResponse_Result::toString($response->getResult())));
        }

        // Update the inventory
        $this->getInventory()->update();

    }

    /**
     * Initialize the transient values.
     */
    protected function initializeTransientValues()
    {
        // Initialize the pokemon level
        $this->level = CombatPointsCalculator::getLevel(
            $this->getPokemonData()->getCpMultiplier() + $this->getPokemonData()->getAdditionalCpMultiplier());

        // Initialize the pokemon name
        $this->name = $this->getNameOrNickname();

        // Calculates the IV ratio
        $this->ivRatio = ($this->getIndividualAttack() +
                $this->getIndividualDefense() + $this->getIndividualStamina()) / 45.0;

        // Retrieve the pokemon family id
        $this->pokemonFamilyId = BasePokemonRetriever::getPokemonFamilyId($this->getPokemonId());

    }

    /**
     * Returns the pokemon name or nickname.
     *
     * @return string
     */
    protected function getNameOrNickname()
    {
        // Retrieve the pokemon data
        $data = $this->getPokemonData();

        // Check if the pokemon has a nickname
        if ($data->getNickname() != null) {
            return $data->getNickname();
        }

        return PokemonId::toString($this->getPokemonData()->getPokemonId());
    }

    /**
     * Returns the request service.
     *
     * @return PokemonRequestService
     */
    protected function getRequestService()
    {
        return new PokemonRequestService();
    }

    /**
     * Returns the inventory.
     *
     * @return Inventory
     */
    protected function getInventory()
    {
        return $this->getPokemonGoApi()->getInventory();
    }

    /**
     * Returns the candy bank.
     *
     * @return CandyBank
     */
    protected function getCandyBank()
    {
        return $this->getInventory()->getItems()->getCandyBank();
    }

    /**
     * Returns the candy bank.
     *
     * @return Pokedex
     */
    protected function getPokedex()
    {
        return $this->getInventory()->getItems()->getPokedex();
    }

    /**
     * Returns the poke bank.
     *
     * @return PokeBank
     */
    protected function getPokeBank()
    {
        return $this->getPokemonGoApi()->getInventory()->getItems()->getPokeBank();
    }

    /**
     * Returns the pokemon family id.
     *
     * @return integer
     */
    public function getPokemonFamilyId()
    {
        return $this->pokemonFamilyId;
    }

}