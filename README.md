# PokemonGoAPI-PHP
Pokemon GO PHP API library

# Build
  - Clone the repo and cd into the folder
  - `` git clone <repo> ``
  - Install the dependencies
  - `` composer install ``
  - Configure the enviroment file
  - ``cp .env.example .env``

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
$pokeBank = $inventory->getItems()->getPokeBank();

// Retrieve a pokemon of type pidgey
$pokemon = current($pokeBank->getPokemonsByType(PokemonId::PIDGEY));

// Transfer / Release the pokemon (Send to the meat grinder)
$pokemon->transfer();
```

## TODO
  - Implement the Map API
  - Improve Google Oauth
  - Improve logging
  - Improve PTC authentication error handling


## Contributors
  - Nicklas Wallgren

## Credits
- [tejado](https://github.com/tejado) many thanks for the API
- [AeonLucid](https://github.com/AeonLucid/POGOProtos) for improved protos