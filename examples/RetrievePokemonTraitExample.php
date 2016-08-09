<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonId;

class RetrievePokemonTraitExample {

    /**
     * Run the example.
     */
    public function run()
    {
        // Initialize the pokemon go application
        $application = new ApplicationKernel('INSERT_USER', 'INSERT_PASSWORD', Factory::AUTHENTICATION_TYPE_GOOGLE);

        // Retrieve the pokemon go api instance
        $pokemonGoApi = $application->getPokemonGoApi();

        // Retrieve the inventory
        $inventory = $pokemonGoApi->getInventory();

        // Retrieve the poke bank
        $pokeBank = $inventory->getPokeBank();

        // Retrieve a pokemon of type pidgey
        $pokemon = $pokeBank->getPokemons()->first();

        // Check if we retrieved a pokemon
        if (!$pokemon) {
            throw new Exception('Cannot find any pokemons in your PokeBank.');
        }

        echo sprintf("Pokemon %s, Id: %s, Cp: %d, type: %s, attacks: %s and %s, ", $pokemon->getName(), $pokemon->getId(), $pokemon->getCp(), $pokemon->getType1String(), $pokemon->getMove1String(), $pokemon->getMove2String());

    }

}

$example = new RetrievePokemonTraitExample();
$example->run();