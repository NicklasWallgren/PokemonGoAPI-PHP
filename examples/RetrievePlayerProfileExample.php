<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class RetrievePlayerProfileExample {

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

        // Retrieve the profile
        $profile = $pokemonGoApi->getProfile();

        // Retrieve the profile data
        $profileData = $profile->getProfileData();

        echo sprintf('The profile data: %s', print_r($profileData, true));
    }

}

$example = new RetrievePlayerProfileExample();
$example->run();