<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonFamilyId;
use POGOProtos\Enums\PokemonId;

class RetrievePokemonCandyCountExample {

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

        // Retrieve the candy bank
        $candyBank = $inventory->getItems()->getCandyBank();

        // Retrieve the pidgey candy item
        $candyItem = $candyBank->get(PokemonFamilyId::FAMILY_PIDGEY);

        echo sprintf('Number or pidgey candies \'%s\'', $candyItem->getCount());
    }

}

$example = new RetrievePokemonCandyCountExample();
$example->run();