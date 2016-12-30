<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\ReleasePokemonMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\ReleasePokemonResponse;

class TransferPokemonRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::RELEASE_POKEMON;

    /**
     * @var Message The request message
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
        return RequestType::RELEASE_POKEMON;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        $releasePokemonMessage =  new ReleasePokemonMessage();
        $releasePokemonMessage->setPokemonId($this->pokemonId);

        return $releasePokemonMessage;
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return mixed
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = $data->getReturns();

        // Initialize the release pokemon response
        $releasePokemonResponse = new ReleasePokemonResponse();

        // Unmarshall the response
        $releasePokemonResponse->decode($requestData[0]);

        $this->setData($releasePokemonResponse);
    }
}