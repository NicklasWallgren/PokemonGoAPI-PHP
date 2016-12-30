<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\UpgradePokemonMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\UpgradePokemonResponse;

class UpgradePokemonRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::UPGRADE_POKEMON;

    /**
     * @var Message The request message
     */
    protected $message;

    /**
     * @var int
     */
    protected $pokemonId;

    /**
     * UpgradePokemonRequest constructor.
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
        return RequestType::UPGRADE_POKEMON;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        $upgradePokemonMessage =  new UpgradePokemonMessage();
        $upgradePokemonMessage->setPokemonId($this->pokemonId);

        return $upgradePokemonMessage;
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
        $upgradePokemonResponse = new UpgradePokemonResponse();

        // Unmarshall the response
        $upgradePokemonResponse->decode($requestData[0]);

        $this->setData($upgradePokemonResponse);
    }
}