<?php

namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\NicknamePokemonMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\NicknamePokemonResponse;
use ProtobufMessage;

class RenamePokemonRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::NICKNAME_POKEMON;

    /**
     * @var ProtobufMessage The request message
     */
    protected $message;

    /**
     * @var int
     */
    protected $pokemonId;

    /**
     * @var string
     */
    protected $name;

    /**
     * TransferPokemonRequest constructor.
     *
     * @param integer $pokemonId
     * @param string $name
     */
    public function __construct($pokemonId, $name)
    {
        $this->pokemonId = $pokemonId;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::NICKNAME_POKEMON;
    }

    /**
     * @return ProtobufMessage
     */
    public function getMessage()
    {
        $nicknamePokemonMessage = new NicknamePokemonMessage();
        $nicknamePokemonMessage->setPokemonId($this->pokemonId);
        $nicknamePokemonMessage->setNickname($this->name);

        var_dump($nicknamePokemonMessage);

        return $nicknamePokemonMessage;
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return NicknamePokemonResponse
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = $data->getReturns();

        // Initialize the rename pokemon response
        $nicknamePokemonResponse = new NicknamePokemonResponse();

        // Unmarshall the response
        $nicknamePokemonResponse->read($requestData[0]);

        $this->setData($nicknamePokemonResponse);
    }
}