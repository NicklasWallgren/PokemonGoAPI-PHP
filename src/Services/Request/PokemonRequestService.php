<?php


namespace NicklasW\PkmGoApi\Services\Request;

use Exception;
use NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Requests\EvolvePokemonRequest;
use NicklasW\PkmGoApi\Requests\RenamePokemonRequest;
use NicklasW\PkmGoApi\Requests\SetFavoritePokemonRequest;
use NicklasW\PkmGoApi\Requests\TransferPokemonRequest;
use NicklasW\PkmGoApi\Requests\UpgradePokemonRequest;
use NicklasW\PkmGoApi\Services\RequestService;
use POGOProtos\Networking\Responses\ReleasePokemonResponse;

class PokemonRequestService extends RequestService {

    /**
     * Transfer a pokemon.
     *
     * @param integer $pokemonId
     * @return ReleasePokemonResponse
     * @throws AuthenticationException
     * @throws Exception
     */
    public function transfer($pokemonId)
    {
        $transferPokemonRequest = new TransferPokemonRequest($pokemonId);

        $this->requestHandler()->handle($transferPokemonRequest);

        return $transferPokemonRequest->getData();
    }

    /**
     * Renames a pokemon.
     *
     * @param integer $pokemonId
     * @param string  $name
     * @return NicknamePokemonResponse
     */
    public function rename($pokemonId, $name)
    {
        $renamePokemonRequest = new RenamePokemonRequest($pokemonId, $name);

        $this->requestHandler()->handle($renamePokemonRequest);

        return $renamePokemonRequest->getData();
    }

    /**
     * Evolves the pokemon.
     *
     * @param integer $pokemonId
     * @return EvolvePokemonResponse
     * @throws AuthenticationException
     * @throws Exception
     */
    public function envolve($pokemonId)
    {
        $evolvePokemonRequest = new EvolvePokemonRequest($pokemonId);

        $this->requestHandler()->handle($evolvePokemonRequest);

        return $evolvePokemonRequest->getData();
    }

    /**
     * Upgrade the pokemon.
     *
     * @param integer $pokemonId
     * @return UpgradePokemonResponse
     * @throws AuthenticationException
     * @throws Exception
     */
    public function upgrade($pokemonId)
    {
        $upgradePokemonRequest = new UpgradePokemonRequest($pokemonId);

        $this->requestHandler()->handle($upgradePokemonRequest);

        return $upgradePokemonRequest->getData();
    }

    /**
     * Set pokemon favorite.
     *
     * @param integer $pokemonId
     * @param boolean $fav
     * @return SetFavoritePokemonResponse
     * @throws AuthenticationException
     * @throws Exception
     */
    public function favorite($pokemonId, $fav)
    {
        $setFavoritePokemonRequest = new SetFavoritePokemonRequest($pokemonId, $fav);

        $this->requestHandler()->handle($setFavoritePokemonRequest);

        return $setFavoritePokemonRequest->getData();
    }
}