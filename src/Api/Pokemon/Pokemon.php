<?php

namespace NicklasW\PkmGoApi\Api\Pokemon;

use Exception;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokemonItem;
use NicklasW\PkmGoApi\Api\Pokemon\Support\PokemonCombatPointsCalculator;
use NicklasW\PkmGoApi\Api\Pokemon\Support\PokemonDetailsTrait;
use NicklasW\PkmGoApi\Api\Procedure;
use NicklasW\PkmGoApi\Services\Request\PokemonRequestService;
use POGOProtos\Networking\Responses\EvolvePokemonResponse_Result;
use POGOProtos\Networking\Responses\NicknamePokemonResponse_Result;
use POGOProtos\Networking\Responses\ReleasePokemonResponse;
use POGOProtos\Networking\Responses\ReleasePokemonResponse_Result;
use POGOProtos\Networking\Responses\SetFavoritePokemonResponse_Result;
use POGOProtos\Networking\Responses\UpgradePokemonResponse;
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

    use PokemonDetailsTrait;

    /**
     * Pokemon constructor.
     *
     * @param array $pokemonData
     */
    public function __construct($pokemonData)
    {
        $this->data = $pokemonData;
    }

    /**
     * Transfers the pokemon.
     *
     * @return ReleasePokemonResponse
     * @throws Exception
     */
    public function transfer()
    {
        // Execute the API request
        $response = $this->getRequestService()->transfer($this->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== ReleasePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon transfer. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), ReleasePokemonResponse_Result::toString($response->getResult())));
        }

        // Retrieve the poke bank
        $pokeBank = $this->pokeBank();

        // Remove the pokemon from the poke bank
        $pokeBank->removePokemon($this);

        return $response;
    }

    /**
     * Upgrade the pokemon.
     *
     * @return UpgradePokemonResponse
     * @throws Exception
     */
    public function upgrade()
    {
        // Check if possible to upgrade, do we have enough stardust and candy?
        // Check if pokemon have reached the current maximum combat points

        // Execute the API request
        $response = $this->getRequestService()->upgrade($this->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== UpgradePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon upgrade. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), UpgradePokemonResponse_Result::toString($response->getResult())));
        }

        // Retrieve the poke bank
        $pokeBank = $this->pokeBank();

        // Remove the pokemon from the poke bank
        $pokeBank->removePokemon($this);

        return $response;
    }

    /**
     * Renames the pokemon.
     *
     * @param string $name
     * @throws Exception
     * @return NicknamePokemonResponse
     */
    public function rename($name)
    {
        // Execute the API request
        $response = $this->getRequestService()->rename($this->getId(), $name);

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
     * @throws Exception
     */
    public function evolve()
    {
        if (!$this->canEvolve()) {
            return EvolvePokemonResponse_Result::FAILED_INSUFFICIENT_RESOURCES;
        }

        // Execute the API request
        $response = $this->getRequestService()->envolve($this->getId());

        // Check if the request was successfully executed
        if ($response->getResult() !== EvolvePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during pokemon evolve. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), EvolvePokemonResponse_Result::toString($response->getResult())));
        }

        // Update the inventory
        $this->inventory()->update();

        return $response;
    }

    /**
     * Set favorite pokemon.
     *
     * @param boolean $favourite
     * @throws Exception
     * @return SetFavoritePokemonResponse
     */
    public function favorite($favourite)
    {
        // Check if already has the requested state

        // Execute the API request
        $response = $this->getRequestService()->favorite($this->getId(), $favourite);

        // Check if the request was successfully executed
        if ($response->getResult() !== SetFavoritePokemonResponse_Result::SUCCESS) {
            throw new Exception(sprintf('Invalid response during changing favorite state. Result: \'%s\' Code: \'%s\'',
                $response->getResult(), SetFavoritePokemonResponse_Result::toString($response->getResult())));
        }

        // Update pokemon state
        $this->data->setFavorite($favourite);

        return $response;
    }

    /**
     * Returns the pokemon data.
     *
     * @return PokemonItem
     */
    public function getData()
    {
        return parent::getData();
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