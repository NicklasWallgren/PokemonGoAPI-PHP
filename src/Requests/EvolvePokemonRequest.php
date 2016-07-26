<?php

namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\EvolvePokemonMessage;
use POGOProtos\Networking\Requests\Messages\NicknamePokemonMessage;
use POGOProtos\Networking\Requests\Messages\ReleasePokemonMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\EvolvePokemonResponse;
use POGOProtos\Networking\Responses\NicknamePokemonResponse;
use POGOProtos\Networking\Responses\ReleasePokemonResponse;
use ProtobufMessage;

class EvolvePokemonRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::EVOLVE_POKEMON;

    /**
     * @var ProtobufMessage The request message
     */
    protected $message;

    /**
     * @var int
     */
    protected $pokemonId;

    /**
     * TransferPokemonRequest constructor.
     *
     * @param integer $pokemonId
     */
    public function __construct($pokemonId)
    {
        $this->pokemonId = $pokemonId;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::EVOLVE_POKEMON;
    }

    /**
     * @return ProtobufMessage
     */
    public function getMessage()
    {
        $evolvePokemonMessage = new EvolvePokemonMessage();
        $evolvePokemonMessage->setPokemonId($this->pokemonId);

        return $evolvePokemonMessage;
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return EvolvePokemonResponse
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = current($data->getReturnsArray());

        // Initialize the evolve pokemon response
        $evolvePokemonResponse = new EvolvePokemonResponse();

        // Unmarshall the response
        $evolvePokemonResponse->read($requestData);

        $this->setData($evolvePokemonResponse);
    }
}