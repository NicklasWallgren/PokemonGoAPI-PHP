<?php

namespace NicklasW\PkmGoApi\Requests;

use NicklasW\PkmGoApi\Facades\App;
use NicklasW\PkmGoApi\Kernels\ApplicationKernel;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\FortSearchMessage;
use POGOProtos\Networking\Requests\Messages\GetMapObjectsMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\FortSearchResponse;
use ProtobufMessage;

class FortSearchRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::FORT_SEARCH;

    /**
     * @var ProtobufMessage The request message
     */
    protected $message;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var string
     */
    protected $id;

    /**
     * FortSearchRequest constructor.
     *
     * @param string $id
     * @param double $latitude
     * @param double $longitude
     */
    public function __construct($id, $latitude, $longitude)
    {
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::FORT_SEARCH;;
    }

    /**
     * @return GetMapObjectsMessage
     */
    public function getMessage()
    {
        $message = new FortSearchMessage();

        $message->setFortId($this->id);
        $message->setFortLatitude($this->latitude);
        $message->setFortLongitude($this->longitude);

        $message->setPlayerLatitude($this->getCurrentLatitude());
        $message->setPlayerLongitude($this->getCurrentLongitude());

        return $message;
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
        $requestData = current($data->getReturnsArray());

        // Initialize the fort search response
        $fortSearchResponse = new FortSearchResponse();

        // Unmarshall the response
        $fortSearchResponse->read($requestData);

        $this->setData($fortSearchResponse);
    }

    /**
     * Returns the current latitude of the player.
     *
     * @return float
     */
    protected function getCurrentLatitude()
    {
        return $this->getApplication()->getLatitude();
    }

    /**
     * Returns the current longitude of the player.
     *
     * @return float
     */
    protected function getCurrentLongitude()
    {
        return $this->getApplication()->getLongitude();
    }

    /**
     * Returns the application.
     *
     * @return ApplicationKernel
     */
    protected function getApplication()
    {
        return App::getInstance();
    }

}