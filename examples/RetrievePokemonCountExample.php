<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonFamilyId;
use POGOProtos\Enums\PokemonId;

class RetrievePokemonCountExample {

    /**
     * Run the example.
     */
    public function run()
    {
        // Initialize the pokemon go application
        $application = new ApplicationKernel(
            'walle.sthlm@gmail.com', 'nicklasintelligentochsmart', Factory::AUTHENTICATION_TYPE_GOOGLE);

        // Retrieve the pokemon go api instance
        $pokemonGoApi = $application->getPokemonGoApi();

        // Retrieve the inventory
        $inventory = $pokemonGoApi->getInventory();

        // Retrieve the poke bank
        $pokeBank = $inventory->getItems()->getPokeBank();

        // Retrieve a pokemons of type pidgey
        $pokemons = $pokeBank->getPokemonsByType(PokemonId::PIDGEY);

        echo sprintf('Number of pokemon of type pidgey: \'%s\'', sizeof($pokemons));
    }

}

$example = new RetrievePokemonCountExample();
$example->run();