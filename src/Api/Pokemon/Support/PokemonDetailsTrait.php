<?php

namespace NicklasW\PkmGoApi\Api\Pokemon\Support;

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\CandyItem;
use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMetaRegistry;
use POGOProtos\Enums\PokemonId;
use POGOProtos\Enums\PokemonMove;
use POGOProtos\Enums\PokemonType;
use POGOProtos\Networking\Responses\EvolvePokemonResponse_Result;
use POGOProtos\Networking\Responses\UpgradePokemonResponse_Result;

trait PokemonDetailsTrait
{

    /**
     * Returns the pokemon family id.
     *
     * @return integer
     */
    public function getFamilyId()
    {
        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        return $data->getFamily();
    }

    /**
     * Returns the pokemon type.
     *
     * @return string
     */
    public function getType1String()
    {
        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        return PokemonType::toString($data->getType1());
    }

    /**
     * Returns the pokemon move1.
     *
     * @return string
     */
    public function getMove1String()
    {
        return PokemonMove::toString($this->getMove1());
    }

    /**
     * Returns the pokemon move2.
     *
     * @return string
     */
    public function getMove2String()
    {
        return PokemonMove::toString($this->getMove2());
    }

    /**
     * Returns the combat points after powerup.
     *
     * @return int
     */
    public function getCpAfterPowerup()
    {
        return CombatPointsCalculator::getCpAfterPowerup($this->getCp(),
            $this->getCpMultiplier() + $this->getAdditionalCpMultiplier());
    }

    /**
     * Returns the candy cost for powerup.
     *
     * @return integer
     */
    public function getCandyCostForPowerup()
    {
        return CombatPointsCalculator::getCandyCostForPowerup($this->getCpMultiplier() + $this->getAdditionalCpMultiplier(),
            $this->getNumUpgrades());
    }

    /**
     * Returns the stardust cost for powerup.
     *
     * @return integer
     */
    public function getStardustCostsForPowerup()
    {
        return CombatPointsCalculator::getStardustCostsForPowerup($this->getCpMultiplier() + $this->getAdditionalCpMultiplier(),
            $this->getNumUpgrades());
    }

    /**
     * Returns true if injured, false otherwise.
     *
     * @return boolean
     */
    public function isInjured()
    {
        return !$this->isFainted() && $this->getStamina() < $this->getStaminaMax();
    }

    /**
     * Returns true if fainted, false otherwise.
     *
     * @return boolean
     */
    public function isFainted()
    {
        return $this->getStamina() == 0;
    }

    /**
     * Returns true if it is possible to evolve, false otherwise.
     *
     * @return boolean
     */
    public function canEvolve()
    {
        return $this->getEvolveStatus() === EvolvePokemonResponse_Result::SUCCESS;
    }

    /**
     * Returns the evolve status.
     *
     * @return int
     */
    public function getEvolveStatus()
    {
        // Check if the pokemon is deployed at fort
        if ($this->isDeployed()) {
            return EvolvePokemonResponse_Result::FAILED_POKEMON_IS_DEPLOYED;
        }

        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        // Check if the pokemon type can be evolved
        if ($data->getCandyToEvolve() !== 0) {
            return EvolvePokemonResponse_Result::FAILED_POKEMON_CANNOT_EVOLVE;
        }

        if ($this->getCandies()->getCount() < $data->getCandyToEvolve()) {
            return EvolvePokemonResponse_Result::FAILED_INSUFFICIENT_RESOURCES;
        }
    }

    /**
     * Returns true if it is possible to upgrade, false otherwise.
     *
     * @return boolean
     */
    public function canUpgrade()
    {
        return $this->getUpgradeStatus() === UpgradePokemonResponse_Result::SUCCESS;
    }

    /**
     * Returns the upgrade status.
     *
     * @return int
     */
    public function getUpgradeStatus()
    {
        // Check if the pokemon is deployed at fort
        if ($this->isDeployed()) {
            return UpgradePokemonResponse_Result::ERROR_POKEMON_IS_DEPLOYED;
        }

        // Retrieve the amount of stardust
        $stardustAmount = $this->profile()->getCurrencies()->getStardust()->getAmount();

        // Retrieve the candy amount
        $candyAmount = $this->getCandies()->getCount();

        if ($stardustAmount < $this->getStardustCostsForPowerup() || $candyAmount < $this->getCandyCostForPowerup()) {
            return UpgradePokemonResponse_Result::ERROR_INSUFFICIENT_RESOURCES;
        }

        return UpgradePokemonResponse_Result::SUCCESS;
    }


    /**
     * Returns the base stamina.
     *
     * @return integer
     */
    public function getBaseStamina()
    {
        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        return $data->getBaseStamina();
    }

    /**
     * Returns the base capture rate.
     *
     * @return double
     */
    public function getBaseCaptureRate()
    {
        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        return $data->getBaseCaptureRate();
    }

    /**
     * Returns the candies to evolve.
     *
     * @return integer
     */
    public function getCandiesToEvolve()
    {
        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        return $data->getCandyToEvolve();
    }

    /**
     * Returns base flee rate.
     *
     * @return integer
     */
    public function getBaseFleeRate()
    {
        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        return $data->getBaseFleeRate();
    }

    /**
     * Returns the pokemon name.
     *
     * @return mixed|string
     */
    public function getName()
    {
        return $this->getNameOrNickname();
    }

    /**
     * Returns the level.
     *
     * @return float
     */
    public function getLevel()
    {
        return CombatPointsCalculator::getLevel($this->getCpMultiplier() + $this->getAdditionalCpMultiplier());
    }

    /**
     * @return float
     */
    public function getIvRatio()
    {
        return ($this->getIndividualAttack() +
            $this->getIndividualDefense() + $this->getIndividualStamina()) / 45.0;
    }

    /**
     * Returns the number of candies.
     *
     * @return CandyItem
     */
    public function getCandies()
    {
        return $this->candyBank()->get($this->getFamilyId());
    }

    /**
     * Returns the pokedex entry.
     *
     * @return PokedexItem
     */
    public function getPokedexEntry()
    {
        return $this->pokedex()->get($this->getPokemonId());
    }

    /**
     * Returns true if deployed, false otherwise.
     *
     * @return boolean
     */
    public function isDeployed()
    {
        return $this->getDeployedFortId() !== null;
    }

    /**
     * Returns the pokemon name or nickname.
     *
     * @return string
     */
    protected function getNameOrNickname()
    {
        // Check if the pokemon has a nickname
        if ($this->getNickname() != null) {
            return $this->getNickname();
        }

        return PokemonId::toString($this->getPokemonId());
    }

}