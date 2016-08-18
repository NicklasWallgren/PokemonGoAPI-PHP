<?php

namespace NicklasW\PkmGoApi\Authentication\Config;

use NicklasW\PkmGoApi\Authentication\AccessToken;

class AccessTokenConfig extends AccessToken{


    /**
     * @var string
     */
    protected $env_file_path;



    public function __construct(AccessToken $accessToken)
    {
        $this->setAccessToken($accessToken);
    }

    public function setAccessToken(AccessToken $accessToken)
    {

        $this->token            = $accessToken->getToken();
        $this->provider         = $accessToken->getProvider();
        $this->timestamp        = $accessToken->getTimestamp();
        $this->refreshToken     = $accessToken->getRefreshToken();

    }


    /**
     * @return string
     */
    public function getEnvFilePath()
    {

        // attempt to resolve environment file by looking up the parent directories
        // the default depth limit is 4
        if ($this->env_file_path === null) {

            $this->env_file_path = searchEnvFilePath();

        }

        return $this->env_file_path;
    }

    /**
     * @return string
     */
    public function setEnvFilePath($path)
    {
        $this->env_file_path = $path;
    }


}