<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonId;

class RetrievePokemonCountExample {

    /**
     * Run the example.
     */
    public function run()
    {
        // Create the authentication config
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_GOOGLE);
        $config->setUser('walle.sthlm@gmail.com');
        $config->setPassword('nicklasintelligentochsmart123');

        // Create the authentication manager
        $manager = Factory::create($config);

        // Initialize the pokemon go application
        $application = new ApplicationKernel($manager);

        // Retrieve the pokemon go api instance
        $pokemonGoApi = $application->getPokemonGoApi();

        // Retrieve the inventory
        $inventory = $pokemonGoApi->getInventory();

        // Retrieve the poke bank
        $pokeBank = $inventory->getPokeBank();

        // Retrieve a pokemons of type pidgey
        $pokemons = $pokeBank->getPokemonsByType(PokemonId::PIDGEY);

        echo sprintf('Number of pokemon of type pidgey: \'%s\'', sizeof($pokemons));
    }

}

$example = new RetrievePokemonCountExample();
$example->run();