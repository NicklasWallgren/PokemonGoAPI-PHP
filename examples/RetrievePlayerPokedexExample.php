<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Api\Pokemon\Data\PokemonMetaRegistry;
use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonId;

class RetrievePlayerPokedexExample {

    /**
     * Run the example.
     */
    public function run()
    {
        // Initialize the pokemon go application
        $application = new ApplicationKernel(
            'INSERT_USER', 'INSERT_PASSWORD', Factory::AUTHENTICATION_TYPE_GOOGLE);

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
                echo sprintf("Informations about Pokemon %d. Name: %s <br />", $i, $pokemonmeta->getuniqueId());
            }
            else
                echo sprintf("No information about id: %d<br />", $i);
        }
    }
}

$example = new RetrievePlayerPokedexExample();
$example->run();
