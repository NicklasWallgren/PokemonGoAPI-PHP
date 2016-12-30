<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Api\Support\Enums\ItemId;
use NicklasW\PkmGoApi\Api\Support\Enums\PokemonId;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class RetrieveJournalExample {

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

        // Retrieve the journal data
        $journal = $pokemonGoApi->getJournal();

        // Loop across all Pokemon encounters
        foreach($journal->getPokemons() as $pkmn) {
            echo sprintf("[%s] [Pokemon] #%s %s, Result: %s, %s CP\n",
                (new DateTime('@'.floor($pkmn->getTimestampMs()/1000)))->format('d.m.Y H:i'),
                $pkmn->getPokemonId(), PokemonId::name($pkmn->getPokemonId()), $pkmn->getResult() == 2 ? 'flee' : 'captured',
                $pkmn->getCombatPoints());
        }

        // Loop across all Pokestop interactions
        foreach($journal->getForts() as $fort) {
           echo sprintf("[%s] [Fort] Eggs: %s, Items: %s\n",
               (new DateTime('@'.floor($fort->getTimestampMs()/1000)))->format('d.m.Y H:i'),
               $fort->getEggs(),
               array_reduce(
                   $fort->getItems(),
                   function($val, $e) {
                       if($val) $val.=', ';
                       return $val.$e->getCount().'x '.ItemId::name($e->getItemId());
                   }
               )
           );
        }
    }

}

$example = new RetrieveJournalExample();
$example->run();