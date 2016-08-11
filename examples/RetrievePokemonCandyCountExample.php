<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonFamilyId;

class RetrievePokemonCandyCountExample {

    /**
     * Run the example.
     */
    public function run()
    {
        // Create the authentication config
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_PTC);
        $config->setUser('INSERT_USER');
        $config->setPassword('INSERT_PASSWORD');

        // Create the authentication manager
        $manager = Factory::create($config);

        // Initialize the pokemon go application
        $application = new ApplicationKernel($manager);

        // Retrieve the pokemon go api instance
        $pokemonGoApi = $application->getPokemonGoApi();

        // Retrieve the inventory
        $inventory = $pokemonGoApi->getInventory();

        // Retrieve the candy bank
        $candyBank = $inventory->getCandyBank();

        // Retrieve the pidgey candy item
        $candyItem = $candyBank->get(PokemonFamilyId::FAMILY_PIDGEY);

        echo sprintf('Number or pidgey candies \'%s\'', $candyItem->getCount());
    }

}

$example = new RetrievePokemonCandyCountExample();
$example->run();