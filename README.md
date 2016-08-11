# PokemonGoAPI-PHP
Pokemon GO PHP API library

# Install
Add the following properties to your project's `composer.json` file:

```json
"minimum-stability": "dev",
"prefer-stable": true
```

Then run the command `composer require nicklasw/pkm-go-api`.

# Usage
EG:
```php
 // Create the authentication config
$config = new Config();
$config->setProvider(Factory::PROVIDER_PTC);
$config->setUser('INSERT_USER');
$config->setPassword('INSERT_PASSWORD');

// Create the authentication manager
$manager = Factory::create($config);

// Add a event listener,
$manager->addListener(function ($event, $value) {
    if ($event === Manager::EVENT_ACCESS_TOKEN) {
        /** @var AccessToken $accessToken */
        $accessToken = $value;

        // Persist the access token in session storage, cache or whatever.
    }
});

// Initialize the pokemon go application
$application = new ApplicationKernel($manager);

// Retrieve the pokemon go api instance
$pokemonGoApi = $application->getPokemonGoApi();

// Retrieve the inventory
$inventory = $pokemonGoApi->getInventory();

// Retrieve the poke bank
$pokeBank = $inventory->getPokeBank();

// Retrieve a pokemon of type pidgey
$pokemon = $pokeBank->getPokemonsByType(PokemonId::PIDGEY)->first();

// Transfer / Release the pokemon (Send to the meat grinder)
$pokemon->transfer();
```

## TODO
  - Implement the Map API
  - Improve logging

## Contributors
  - [Nicklas Wallgren](https://github.com/NicklasWallgren)
  - [Ni42](https://github.com/Ni42)

## Credits
- [Grover-c13](https://github.com/Grover-c13) for the inspiration
- [AeonLucid](https://github.com/AeonLucid/POGOProtos) for improved protos
