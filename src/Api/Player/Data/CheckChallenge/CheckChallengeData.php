<?php

namespace NicklasW\PkmGoApi\Api\Player\Data\CheckChallenge;

use NicklasW\PkmGoApi\Api\Data\Data;
use POGOProtos\Networking\Responses\CheckChallengeResponse;

class CheckChallengeData extends Data {

    /**
     * @var bool The showChallenge value
     */
    protected $showChallenge;

    /**
     * @var string The challengeUrl
     */
    protected $challengeUrl;

    /**
     * Creates a data instance from a Protobuf Message.
     *
     * @param CheckChallengeData $data
     * @return static
     */
    public static function create($data)
    {
        // Check if we retrieved valid data
        if ($data == null) {
            return;
        }

        // Creates a instance of CheckChallengeData
        $instance = new static();

        // Set the showChallenge
        $instance->showChallenge = $data->getShowChallenge();

        // Set the challengeUrl
        $instance->challengeUrl = $data->getChallengeUrl();

        return $instance;
    }
}