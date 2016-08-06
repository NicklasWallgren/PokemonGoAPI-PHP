<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Api\Player\Data\Inventory\ItemMetaRegistry;
use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Inventory\Item\ItemId;

class RetrievePlayerProfileExample {

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

        // Retrieve the applied items instance
        $appliedItems = $inventory->getAppliedItems();

        // Retrieve the items within the applied items instance
        $items = $appliedItems->getAppliedItems();

        foreach($items as $item)
        {
            // Retrieve item name
            $item->setName(ItemId::toString($item->getItemId()));

            echo sprintf('Applied item: %s', print_r($item, true));
        }
    }
}

$example = new RetrievePlayerProfileExample();
$example->run();
