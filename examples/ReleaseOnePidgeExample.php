<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonId;

class ReleaseOnePidgeExample {

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

        // Retrieve the poke bank
        $pokeBank = $inventory->getItems()->getPokeBank();

        // Retrieve a pokemon of type pidgey
        $pokemon = current($pokeBank->getPokemonsByType(PokemonId::PIDGEY));

        // Check if we retireved a pokemon
        if (!$pokemon) {
            throw new Exception('No pokemon of type pidgey found. Please check your inventory');
        }

        // Transfer / Release the pokemon
        $pokemon->transfer();
    }

}

$example = new ReleaseOnePidgeExample();
$example->run();