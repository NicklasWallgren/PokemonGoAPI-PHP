<?php

namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\SetFavoritePokemonMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\SetFavoritePokemonResponse;
use ProtobufMessage;

class SetFavoritePokemonRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::SET_FAVORITE_POKEMON;

    /**
     * @var ProtobufMessage The request message
     */
    protected $message;

    /**
     * @var int
     */
    protected $pokemonId;

    /**
     * @var boolean
     */
    protected $favorite;

    /**
     * TransferPokemonRequest constructor.
     *
     * @param integer $pokemonId
     */
    public function __construct($pokemonId, $favorite)
    {
        $this->pokemonId = $pokemonId;
        $this->favorite = $favorite;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::SET_FAVORITE_POKEMON;
    }

    /**
     * @return ProtobufMessage
     */
    public function getMessage()
    {
        $setFavoritePokemonMessage = new SetFavoritePokemonMessage();
        $setFavoritePokemonMessage->setPokemonId($this->pokemonId);
        $setFavoritePokemonMessage->setIsFavorite($this->favorite);

        return $setFavoritePokemonMessage;
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return SetFavoritePokemonResponse
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = current($data->getReturnsArray());

        // Initialize the rename pokemon response
        $setFavoritePokemonResponse = new SetFavoritePokemonResponse();

        // Unmarshall the response
        $setFavoritePokemonResponse->read($requestData);

        $this->setData($setFavoritePokemonResponse);
    }
}