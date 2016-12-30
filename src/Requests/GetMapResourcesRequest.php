<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\GetMapObjectsMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\GetMapObjectsResponse;

class GetMapResourcesRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::GET_MAP_OBJECTS;

    /**
     * @var Message The request message
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
     * @var array
     */
    protected $cellIds;

    /**
     * GetMapResourcesRequest constructor.
     *
     * @param double $latitude
     * @param double $longitude
     * @param array  $cellIds
     */
    public function __construct($latitude, $longitude, $cellIds)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->cellIds = $cellIds;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::GET_MAP_OBJECTS;;
    }

    /**
     * @return GetMapObjectsMessage
     */
    public function getMessage()
    {
        $message = new GetMapObjectsMessage();

        $message->setLatitude($this->latitude);
        $message->setLongitude($this->longitude);

        foreach ($this->cellIds as $cellId) {
            $message->addCellId($cellId);
            $message->addSinceTimestampMs(0);
        }

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
        $requestData = $data->getReturnsArray();

        // Initialize the map objects response
        $mapObjectsResponse = new GetMapObjectsResponse();

        // Unmarshall the response
        $mapObjectsResponse->read($requestData[0]);

        $this->setData($mapObjectsResponse);
    }
}