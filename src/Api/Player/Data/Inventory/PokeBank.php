<?php


namespace NicklasW\PkmGoApi\Api\Player\Data\Inventory;

use Exception;
use NicklasW\PkmGoApi\Api\Data\Data;
use NicklasW\PkmGoApi\Api\Pokemon\Pokemon;
use POGOProtos\Data\PokemonData;
use POGOProtos\Enums\PokemonId;

/**
 * @method void setPokemons(Pokemon[] $pokemons)
 * @method Pokemon[] getPokemons()
 */
class PokeBank extends Data {

    /**
     * @var Pokemon[]
     */
    protected $pokemons = array();

    /**
     * Add a pokemon to the poke bank by pokemon data.
     *
     * @param PokemonData $data
     */
    public function add($data)
    {
        // Create a new pokemon instance
        $pokemon = new Pokemon(PokemonItem::create($data));

        // Add the pokemon to the list of pokemons
        $this->pokemons[$pokemon->getPokemonData()->getId()] = $pokemon;
    }

    /**
     * Add a pokemon to the poke bank.
     *
     * @param Pokemon $pokemon
     */
    public function addPokemon($pokemon)
    {
        // Add the pokemon to the list of pokemons
        $this->pokemons[$pokemon->getPokemonData()->getId()] = $pokemon;
    }

    /**
     * Remove the pokemon from the poke bank by pokemon id.
     *
     * @param integer $id
     * @return boolean
     */
    public function removeBydId($id)
    {
        // Check if the poke bank contains the pokemon
        if (!array_key_exists($id, $this->pokemons)) {
            return false;
        }

        // Remove the pokemon from the poke bank
        unset($this->pokemons[$id]);

        return true;
    }

    /**
     * Remove the pokemon from the poke bank.
     *
     * @param Pokemon $pokemon
     * @return boolean
     */
    public function removePokemon($pokemon)
    {
        return $this->removeBydId($pokemon->getPokemonData()->getPokemonId());
    }

    /**
     * Returns a pokemon by pokemon id.
     *
     * @param integer $id
     * @return Pokemon
     * @throws Exception
     */
    public function getPokemonById($id)
    {
        // Check if the pokemon exists within the poke bank
        if (!array_key_exists($id, $this->pokemons)) {
            throw new Exception(sprintf('The poke bank does not contain that pokemon. Provided pokemon id: \'%s\'', $id));
        }

        return $this->pokemons[$id];
    }

    /**
     * Returns pokemons by pokemon type.
     *
     * @param integer $typeId
     * @throws Exception
     */
    public function getPokemonsByType($typeId)
    {
        // Check if we retrieved a valid pokemon type id
        if (!PokemonId::isValid($typeId)) {
            throw new Exception(sprintf('Invalid pokemon type id provided. Provided pokemon type id: \'%s\'', $typeId));
        }

        return array_filter($this->pokemons, function (Pokemon $pokemon) use ($typeId) {
            return $pokemon->getPokemonData()->getPokemonId() == $typeId;
        });
    }


}