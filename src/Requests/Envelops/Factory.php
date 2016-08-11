<?php

namespace NicklasW\PkmGoApi\Requests\Envelops;

use NicklasW\PkmGoApi\Authenticators\AccessToken;
use POGOProtos\Networking\Envelopes\RequestEnvelope_AuthInfo;
use POGOProtos\Networking\Envelopes\RequestEnvelope_AuthInfo_JWT;

class Factory {

    /**
     * @var string AuthInfo type
     */
    public static $TYPE_AUTHINFO = 'authinfo';

    /**
     * Envelope factory.
     *
     * @param string $type
     * @param array  ...$parameters
     * @return ProtobufMessage|null
     */
    public function create($type, ...$parameters)
    {
        $envelope = null;

        switch ($type) {
            case self::$TYPE_AUTHINFO:
                // Create Auth Info envelope
                $envelope = $this->authInfoEnvelope(...$parameters);

                break;

        }

        return $envelope;
    }

    /**
     * Creates AuthInfoEnvelope.
     *
     * @param string $type
     * @param AccessToken $token
     * @return RequestEnvelope_AuthInfo
     */
    protected function authInfoEnvelope($type, $token)
    {
        $authInfoJWT = new RequestEnvelope_AuthInfo_JWT();
        $authInfoJWT->setContents($token->getToken());
        $authInfoJWT->setUnknown2(59);

        $authInfoEnvelope = new RequestEnvelope_AuthInfo();
        $authInfoEnvelope->setProvider($type);
        $authInfoEnvelope->setToken($authInfoJWT);

        return $authInfoEnvelope;
    }

}
