<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMetaRegistry;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class RetrievePlayerPokedexExample {

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

        // Retrieve the pokedex
        $pokedex = $inventory->getPokedex();

        // Show info about pokemons
        for($i=1; $i<= 151; $i++)
        {
            // Retrieve MetaRegistry for pokemon
            $pokemonmeta = PokemonMetaRegistry::getByPokemonId($i);

            // Retrieve Pokedex entry for pokemon
            $pokemondata = $pokedex->get($i);

            // If pokedex is empty we don't 'know' that creature
            if($pokemondata !== null)
            {
                echo sprintf("Informations about Pokemon %d. Name: %s \n", $i, $pokemonmeta->getuniqueId());
            }
            else
                echo sprintf("No information about id: %d \n", $i);
        }
    }
}

$example = new RetrievePlayerPokedexExample();
$example->run();
