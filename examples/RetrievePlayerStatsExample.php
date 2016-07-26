<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class RetrievePlayerStatsExample {

    /**
     * Run the example.
     */
    public function run()
    {
        // Initialize the pokemon go application
        $application = new ApplicationKernel(
            'INSERT_EMAIL', 'INSERT_PASSWORD', Factory::AUTHENTICATION_TYPE_GOOGLE);

        // Retrieve the pokemon go api instance
        $pokemonGoApi = $application->getPokemonGoApi();

        // Retrieve the inventory
        $inventory = $pokemonGoApi->getInventory();

        // Retrieve the player stats
        $playerStats = $inventory->getItems()->getStats();

        echo sprintf('The player level: %s', $playerStats->getLevel());
    }

}

$example = new RetrievePlayerStatsExample();
$example->run();