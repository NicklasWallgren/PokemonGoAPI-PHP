<?php
/**
 * @author DrDelay <info@vi0lation.de>
 */

namespace NicklasW\PkmGoApi\Test\Api\Pokemon;

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\CandyItem;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\PokemonItem;
use NicklasW\PkmGoApi\Api\Player\Data\Inventory\Stats;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\Currencies;
use NicklasW\PkmGoApi\Api\Player\Data\Profile\Currency;
use NicklasW\PkmGoApi\Api\Player\Inventory;
use NicklasW\PkmGoApi\Api\Player\Profile;
use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMetaRegistry;
use NicklasW\PkmGoApi\Api\Pokemon\Pokemon;
use POGOProtos\Enums\PokemonId;

class PokemonTest extends \PHPUnit_Framework_TestCase
{
    const UPGRADE_TEST_LEVEL = 30;

    /**
     * Get a Pokemon mock with overwritten getCandies method.
     *
     * @param PokemonItem $pokemonItem
     * @param CandyItem   $candyItem
     *
     * @return Pokemon|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function buildCandyMockedPokemon(PokemonItem $pokemonItem, CandyItem $candyItem)
    {
        $stub = $this->getMockBuilder(Pokemon::class)
            ->setConstructorArgs([$pokemonItem])
            ->setMethods(['getCandies'])
            ->getMock();

        $stub->method('getCandies')->willReturn($candyItem);

        return $stub;
    }

    /**
     * Get a Pokemon mock with overwritten methods for getting player level, stardust and candy.
     *
     * @param PokemonItem $pokemonItem
     * @param int         $level
     * @param Currency    $stardust
     * @param CandyItem   $candyItem
     *
     * @return Pokemon|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function buildLevelStardustCandyMockedPokemon(PokemonItem $pokemonItem, $level, Currency $stardust, CandyItem $candyItem)
    {
        $stub = $this->getMockBuilder(Pokemon::class)
            ->setConstructorArgs([$pokemonItem])
            ->setMethods([
                'inventory',
                'profile',
                'getCandies',
            ])
            ->getMock();

        $statsStub = $this->getMockBuilder(Stats::class)
            ->disableOriginalConstructor()
            ->setMethods(['getLevel'])
            ->getMock();
        $statsStub->method('getLevel')->willReturn($level);
        $inventoryStub = $this->getMockBuilder(Inventory::class)
            ->disableOriginalConstructor()
            ->setMethods(['getStats'])
            ->getMock();
        $inventoryStub->method('getStats')->willReturn($statsStub);

        $currenciesStub = $this->getMockBuilder(Currencies::class)
            ->disableOriginalConstructor()
            ->setMethods(['getStardust'])
            ->getMock();
        $currenciesStub->method('getStardust')->willReturn($stardust);
        $profileStub = $this->getMockBuilder(Profile::class)
            ->disableOriginalConstructor()
            ->setMethods(['getCurrencies'])
            ->getMock();
        $profileStub->method('getCurrencies')->willReturn($currenciesStub);

        $stub->method('inventory')->willReturn($inventoryStub);
        $stub->method('profile')->willReturn($profileStub);
        $stub->method('getCandies')->willReturn($candyItem);

        return $stub;
    }

    /**
     * Tests that the deployment status of a Pokemon is identified correctly.
     *
     * @param PokemonItem $pokemonItem
     * @param bool        $deploymentStatus
     *
     * @dataProvider providerDeployedPokemon
     */
    public function testIsDeployed(PokemonItem $pokemonItem, $deploymentStatus)
    {
        $pokemon = new Pokemon($pokemonItem);
        $this->assertSame($deploymentStatus, $pokemon->isDeployed());
    }

    /**
     * Provides a set of Test-PokemonItems for checking their deployment to a fort.
     *
     * @return array
     */
    public function providerDeployedPokemon()
    {
        $deployedTo20 = new PokemonItem();
        $deployedTo20->setDeployedFortId(20);
        yield [$deployedTo20, true];

        $undeployed = new PokemonItem();
        yield [$undeployed, false];
    }

    /**
     * Tests that evolvability of a Pokemon is identified correctly.
     *
     * @param Pokemon $pokemon
     * @param bool    $evolvability
     *
     * @dataProvider providerEvolvePokemon
     */
    public function testCanEvolve(Pokemon $pokemon, $evolvability)
    {
        $this->assertSame($evolvability, $pokemon->canEvolve());
    }

    /**
     * Provides a set of Test-Pokemons for checking their evolvability.
     *
     * @return array
     */
    public function providerEvolvePokemon()
    {
        $deployedTo20 = new PokemonItem();
        $deployedTo20->setDeployedFortId(20);
        yield [new Pokemon($deployedTo20), false];

        $venusaur = new PokemonItem();
        $venusaur->setPokemonId(PokemonId::VENUSAUR);
        yield [new Pokemon($venusaur), false];

        $bulbasaur = new PokemonItem();
        $bulbasaur->setPokemonId(PokemonId::BULBASAUR);

        $noCandy = new CandyItem();
        $noCandy->setCandy(0);
        yield [$this->buildCandyMockedPokemon($bulbasaur, $noCandy), false];

        $bulbasaurMeta = PokemonMetaRegistry::getByPokemonId(PokemonId::BULBASAUR);
        $enoughCandy = new CandyItem();
        $enoughCandy->setCandy($bulbasaurMeta->getCandyToEvolve() * 3);
        yield [$this->buildCandyMockedPokemon($bulbasaur, $enoughCandy), true];
    }

    /**
     * Tests that upgradeability of a Pokemon is identified correctly.
     *
     * @param Pokemon $pokemon
     * @param bool    $upgradeability
     *
     * @dataProvider providerUpgradePokemon
     */
    public function testCanUpgrade(Pokemon $pokemon, $upgradeability)
    {
        $this->assertSame($upgradeability, $pokemon->canUpgrade());
    }

    /**
     * Provides a set of Test-Pokemons for checking their upgradeability.
     *
     * @return array
     */
    public function providerUpgradePokemon()
    {
        $deployedTo20 = new PokemonItem();
        $deployedTo20->setDeployedFortId(20);
        yield [new Pokemon($deployedTo20), false];

        $abraMeta = PokemonMetaRegistry::getByPokemonId(PokemonId::ABRA);
        $abra = new PokemonItem();
        $abra->setPokemonId(PokemonId::ABRA);
        $abraOnSteroids = clone $abra;
        $abraOnSteroids->setCp(PHP_INT_MAX);

        $noStardust = new Currency();
        $noStardust->setAmount(0);
        $muchStardust = new Currency();
        $muchStardust->setAmount(PHP_INT_MAX);
        $noCandy = new CandyItem();
        $noCandy->setCandy(0);
        $enoughCandy = new CandyItem();
        $enoughCandy->setCandy($abraMeta->getCandyToEvolve() * 3);

        yield [$this->buildLevelStardustCandyMockedPokemon($abraOnSteroids, 1, $muchStardust, $enoughCandy), false];

        yield [$this->buildLevelStardustCandyMockedPokemon($abra, static::UPGRADE_TEST_LEVEL, $muchStardust, $noCandy), false];
        yield [$this->buildLevelStardustCandyMockedPokemon($abra, static::UPGRADE_TEST_LEVEL, $noStardust, $enoughCandy), false];

        yield [$this->buildLevelStardustCandyMockedPokemon($abra, static::UPGRADE_TEST_LEVEL, $muchStardust, $enoughCandy), true];
    }
}
