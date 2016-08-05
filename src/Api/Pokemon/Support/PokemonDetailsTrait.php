<?php

namespace NicklasW\PkmGoApi\Api\Pokemon\Support;

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\CandyItem;
use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMetaRegistry;
use NicklasW\PkmGoApi\Api\Support\MakeApiResourcesAvailable;
use POGOProtos\Enums\PokemonId;

trait PokemonDetailsTrait {

    use MakeApiResourcesAvailable;

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
        // Retrieve the pokemon metadata
        $data = PokemonMetaRegistry::getByPokemonId($this->getPokemonId());

        return $data->getCandyToEvolve() !== 0 && $this->getCandies()->getCount() >= $data->getCandyToEvolve();
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
        return $this->getCandyBank()->get($this->getFamilyId());
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
     * Returns the pokemon name or nickname.
     *
     * @return string
     */
    protected function getNameOrNickname()
    {
        // Check if the pokemon has a nickname
        if ($this->data->getNickname() != null) {
            return $this->data->getNickname();
        }

        return PokemonId::toString($this->getPokemonId());
    }

}