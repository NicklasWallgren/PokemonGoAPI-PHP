<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\ItemMetaRegistry;
use NicklasW\PkmGoApi\Api\Support\ItemId;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class RetrieveAppliedItemsExample {

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

        // Retrieve the applied items instance
        $appliedItems = $inventory->getAppliedItems();

        // Retrieve the items within the applied items instance
        $items = $appliedItems->getAppliedItems();

        foreach($items as $item)
        {
            // Retrieve item name
            $item->setName(ItemId::name($item->getItemId()));

            echo sprintf('Applied item: %s', print_r($item, true));
        }
    }
}

$example = new RetrieveAppliedItemsExample();
$example->run();
