<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authenticators\Factory;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Enums\PokemonId;

class RetrievePlayerProfileExample {

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

        // Retrieve the profile
        $profile = $pokemonGoApi->getProfile();

        // Retrieve the profile data
        $profileData = $profile->getProfileData();

        echo sprintf('The profile data: %s', print_r($profileData, true));
    }

}

$example = new RetrievePlayerProfileExample();
$example->run();