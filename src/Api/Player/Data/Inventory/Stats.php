<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Inventory\AppliedItem as AppliedItemData;
use POGOProtos\Inventory\AppliedItems as AppliedItemsData;

/**
 * @method void setLevel(int $candies)
 * @method void setExperience(int $experience)
 * @method void setPrevLevelXp(int $prevLevelXp)
 * @method void setNextLevelXp(int $nextLevelXp)
 * @method void setKmWalked(int $kmWalked)
 * @method void setPokemonsEncountered(int $pokemonsEncountered)
 * @method void setAppliedItems(int $candies)
 * @method void setUniquePokedexEntries(int $uniquePokedexEntries)
 * @method void setPokemonsCaptured(int $pokemonsCaptured)
 * @method void setEvolutions(int $evolutions)
 * @method void setPokeStopVisits(int $pokeStopVisits)
 * @method void setPokeballsThrown(int $pokeballsThrown)
 * @method void setEggsHatched(int $eggsHatched)
 * @method void setBigMagikarpCaught(int $bigMagikarpCaught)
 * @method void setBattleAttackWon(int $battleAttackWon)
 * @method void setBattleAttackTotal(int $battleAttackTotal)
 * @method void setBattleDefendedWon(int $battleDefendedWon)
 * @method void setBattleTrainingWon(int $battleTrainingWon)
 * @method void setBattleTrainingTotal(int $battleTrainingTotal)
 * @method void setPrestigeRaisedTotal(int $prestigeRaisedTotal)
 * @method void setPrestigeDroppedTotal(int $prestigeDroppedTotal)
 * @method void setPokemonDeployed(int $pokemonDeployed)
 * @method void setPokemonCaughtByType(string $pokemonCaughtByType)
 * @method void setSmallRattataCaught(int $smallRattataCaught)
 
 * @method int getLevel()
 * @method int getExperience()
 * @method int getPrevLevelXp()
 * @method int getNextLevelXp()
 * @method int getKmWalked()
 * @method int getPokemonsEncountered()
 * @method int getAppliedItems()
 * @method int getUniquePokedexEntries()
 * @method int getPokemonsCaptured()
 * @method int getEvolutions()
 * @method int getPokeStopVisits()
 * @method int getPokeballsThrown()
 * @method int getEggsHatched()
 * @method int getBigMagikarpCaught()
 * @method int getBattleAttackWon()
 * @method int getBattleAttackTotal()
 * @method int getBattleDefendedWon()
 * @method int getBattleTrainingWon()
 * @method int getBattleTrainingTotal()
 * @method int getPrestigeRaisedTotal()
 * @method int getPrestigeDroppedTotal()
 * @method int getPokemonDeployed()
 * @method int getPokemonCaughtByType()
 * @method int getSmallRattataCaught()
 */
class Stats extends Data {

    /**
     * @var int
     */
    protected $level = 0;

    /**
     * @var int
     */
    protected $experience = 0;

    /**
     * @var int
     */
    protected $prevLevelXp = 0;

    /**
     * @var int
     */
    protected $nextLevelXp = 0;

    /**
     * @var int
     */
    protected $kmWalked = 0;

    /**
     * @var int
     */
    protected $pokemonsEncountered = 0;

    /**
     * @var int
     */
    protected $uniquePokedexEntries = 0;

    /**
     * @var int
     */
    protected $pokemonsCaptured = 0;

    /**
     * @var int
     */
    protected $evolutions = 0;

    /**
     * @var int
     */
    protected $pokeStopVisits = 0;

    /**
     * @var int
     */
    protected $pokeballsThrown = 0;

    /**
     * @var int
     */
    protected $eggsHatched = 0;

    /**
     * @var int
     */
    protected $bigMagikarpCaught = 0;

    /**
     * @var int
     */
    protected $battleAttackWon = 0;

    /**
     * @var int
     */
    protected $battleAttackTotal = 0;

    /**
     * @var int
     */
    protected $battleDefendedWon = 0;

    /**
     * @var int
     */
    protected $battleTrainingWon = 0;

    /**
     * @var int
     */
    protected $battleTrainingTotal = 0;

    /**
     * @var int
     */
    protected $prestigeRaisedTotal = 0;

    /**
     * @var int
     */
    protected $prestigeDroppedTotal = 0;

    /**
     * @var int
     */
    protected $pokemonDeployed = 0;

    /**
     * @var string
     */
//    protected $pokemonCaughtByType = "";

    /**
     * @var int
     */
    protected $smallRattataCaught = 0;

    /**
     * @var int[]
     */
    protected static $requiredXp = [
        0, 1000, 3000, 6000, 10000, 15000, 21000, 28000, 36000, 45000, 55000, 65000, 75000, 85000, 100000, 120000,
        140000, 160000, 185000, 210000, 260000, 335000, 435000, 560000, 710000, 900000, 1100000, 1350000, 1650000,
        2000000, 2500000, 3000000, 3750000, 4750000, 6000000, 7500000, 9500000, 12000000, 15000000, 20000000];

    /**
     * Return the XP required for the given level.
     *
     * @param int $level
     * @return int
     */
    public function getLevelXp($level = 1) {
        return isset(self::$requiredXp[$level-1]) ? self::$requiredXp[$level-1] : 0;
    }

    /**
     * Return the XP required for the current level.
     *
     * @return int
     */
    public function getCurrentLevelXp() {
        return $this->getLevelXp($this->getLevel());
    }

    /**
     * Return the XP earned on the current level.
     *
     * @return number
     */
    public function getCurrentLevelProgressXp() {
        return $this->getExperience() - $this->getCurrentLevelXp();
    }

}