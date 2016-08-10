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
// Initialize the pokemon go application
$application = new ApplicationKernel('INSERT_EMAIL', 'INSERT_PASSWORD', Factory::AUTHENTICATION_TYPE_GOOGLE);

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
