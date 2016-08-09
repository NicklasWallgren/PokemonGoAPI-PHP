<?php

require __DIR__ . '/../vendor/autoload.php';

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;

class AuthenticationExample {

    /**
     * Run the example.
     */
    public function run()
    {
        echo "This is not a runnable script.";

        // EXAMPLE Authentication via Google user credentials
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_GOOGLE);
        $config->setUser('INSERT_EMAIL');
        $config->setPassword('INSERT_PASSWORD');

        // Create the authentication manager
        $manager = Factory::create($config);

        // EXAMPLE Authentication via PTC user credentials
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_PTC);
        $config->setUser('INSERT_USER');
        $config->setPassword('INSERT_PASSWORD');

        // Create the authentication manager
        $manager = Factory::create($config);

        // EXAMPLE Authentication via Google authentication code
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_GOOGLE);
        $config->setAuthToken('INSERT_AUTHENTICATION_CODE');

        // EXAMPLE Authentication via Google refresh token
        $config = new Config();
        $config->setProvider(Factory::PROVIDER_GOOGLE);
        $config->setRefreshToken('INSERT_AUTHENTICATION_REFRESH_TOKEN');

        // Add a event listener,
        $manager->addListener(function ($event, $value) {

            if ($event === Manager::EVENT_ACCESS_TOKEN) {
                /** @var AccessToken $accessToken */
                $accessToken = $value;

                // Persist the access token in session storage, cache or whatever.
                // The persisted access token should be passed to the Authentication factory for authentication
            }

        });

        // Initialize the pokemon go application
        $application = new ApplicationKernel($manager);
    }

}

echo "This is not a runnable example script.";
