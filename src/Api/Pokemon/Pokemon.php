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
use NicklasW\PkmGoApi\Api\Pokemon\Support\PokemonDetailsTrait;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Api\Support\MakeDataPropertiesCallable;
use NicklasW\PkmGoApi\Services\Request\PokemonRequestService;
use POGOProtos\Enums\PokemonId;
use POGOProtos\Networking\Responses\EvolvePokemonResponse_Result;
use POGOProtos\Networking\Responses\NicknamePokemonResponse_Result;
use POGOProtos\Networking\Responses\ReleasePokemonResponse_Result;
use POGOProtos\Networking\Responses\SetFavoritePokemonResponse_Result;
use POGOProtos\Networking\Responses\UpgradePokemonResponse_Result;

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
    use PokemonDetailsTrait;

    /**
     * @var PokemonItem
     */
    protected $data;

    /**
     * Pokemon constructor.
     *
     * @param array $pokemonData
     */
    public function __construct($pokemonData)
    {
        $this->data = $pokemonData;

        parent::__construct();
    }

    /**
     * Transfers the pokemon.
     *
     * @return ReleasePokemonResponse
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

        return $response;
    }

    /**
     * Upgrade the pokemon.
     *
     * @return UpgradePokemonResponse
     */
    public function upgrade()
    {
        // Execute the API request
        $response = $this->getRequestService()->upgrade($this->getPokemonData()->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== UpgradePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon upgrade. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), UpgradePokemonResponse_Result::toString($response->getResult())));
        }

        // Retrieve the poke bank
        $pokeBank = $this->getPokeBank();

        // Remove the pokemon from the poke bank
        $pokeBank->removePokemon($this);

        return $response;
    }

    /**
     * Renames the pokemon.
     *
     * @param string $name
     * @throws Exception
     *
     * @return NicknamePokemonResponse
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

        return $response;
    }

    /**
     * Evolves the pokemon.
     *
     * @return EvolvePokemonResponse
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

        return $response;
    }

    /**
     * Set favourite pokemon.
     *
     * @param boolean $favourite
     * @throws Exception
     *
     * @return SetFavoritePokemonResponse
     */
    public function favourite($fav)
    {
        // Execute the API request
        $response = $this->getRequestService()->favourite($this->getPokemonData()->getId(), $fav);

        // Check if the request was successfully executed
        if ($response->getResult() !== SetFavoritePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during setting favourite pokemon. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), SetFavoritePokemonResponse_Result::toString($response->getResult())));
        }

        // Update pokemon state
        $this->data->setFavourite($fav);

        return $response;
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
     * Returns the request service.
     *
     * @return PokemonRequestService
     */
    protected function getRequestService()
    {
        return new PokemonRequestService();
    }

}