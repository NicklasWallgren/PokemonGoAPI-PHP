<?php

namespace NicklasW\PkmGoApi\Handlers;

use NicklasW\PkmGoApi\Handlers\RequestHandler\Exceptions\UnsupportedPlatformException;
use POGOProtos\Networking\Envelopes\AuthTicket;
use POGOProtos\Networking\Envelopes\Signature as SignatureEnvelope;
use POGOProtos\Networking\Requests\Request;
use POGOEncrypt\Encrypt;

class Signature {

    /**
     * @var SignatureEnvelope
     */
    protected $signature;

    /**
     * Signature constructor.
     *
     * @param Request $request
     * @param AuthTicket $authTicket
     * @param float $latitude
     * @param float $longitude
     * @param float $altitude
     *
     * @throws UnsupportedPlatformException
     */
    public function __construct(Request $request, AuthTicket $authTicket, $latitude, $longitude, $altitude = 8.0)
    {
        if (!function_exists('xxhash32') || !function_exists('xxhash64') || !function_exists('random_bytes')) {
            throw new UnsupportedPlatformException("Signing requests requires the php-xxhash library.");
        }

        $serializedTicket = $authTicket->toProtobuf();

        $this->signature = new SignatureEnvelope();
        $this->signature->setLocationHash1($this->generateLocationHash1($serializedTicket, $latitude, $longitude, $altitude));
        $this->signature->setLocationHash2($this->generateLocationHash2($latitude, $longitude, $altitude));

        $this->signature->addRequestHash($this->generateRequestHash($serializedTicket, $request->toProtobuf()));

        $timestamp = $this->getTimestamp();
        $this->signature->setTimestamp($timestamp);
        $this->signature->setTimestampSinceStart($timestamp);
        $this->signature->setSessionHash(random_bytes(32));
    }

    /**
     * Get the signature
     *
     * @return SignatureEnvelope
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Get the encrypted value
     *
     * @return string
     */
    public function getEncryptedValue()
    {
        return Encrypt::encrypt($this->signature->toProtobuf(), random_bytes(32));
    }

    /**
     * @param $serializedTicket
     * @param $latitude
     * @param $longitude
     * @param $altitude
     * @return number
     */
    protected function generateLocationHash1($serializedTicket, $latitude, $longitude, $altitude)
    {
        $seed = hexdec(xxhash32($serializedTicket, 0x1B845238));
        return hexdec(xxhash32($this->getLocationBytes($latitude, $longitude, $altitude), $seed));
    }

    /**
     * @param $latitude
     * @param $longitude
     * @param $altitude
     * @return int
     */
    protected function generateLocationHash2($latitude, $longitude, $altitude)
    {
        return hexdec(xxhash32($this->getLocationBytes($latitude, $longitude, $altitude), 0x1B845238));
    }

    /**
     * @param $serializedTicket
     * @param $serializedRequest
     * @return int
     */
    protected function generateRequestHash($serializedTicket, $serializedRequest)
    {
        $seed = hexdec(xxhash64($serializedTicket, 0x1B845238));
        return hexdec(xxhash64($serializedRequest, $seed));
    }

    /**
     * @param $latitude
     * @param $longitude
     * @param $altitude
     * @return string
     */
    protected function getLocationBytes($latitude, $longitude, $altitude)
    {
        return $this->d2h($latitude) . $this->d2h($longitude) . $this->d2h($altitude);
    }

    /**
     * Get timestamp in ms
     *
     * @return int
     */
    protected function getTimestamp()
    {
        return round(microtime(true) * 1000);
    }

    /**
     * @param $float
     * @return string
     */
    protected function float2hex($float)
    {
        return dechex(unpack('Q', pack('d', $float))[1]);
    }

    /**
     * @param $float
     * @return string
     */
    protected function d2h($float)
    {
        return pack("H*", $this->float2hex($float));
    }
}
