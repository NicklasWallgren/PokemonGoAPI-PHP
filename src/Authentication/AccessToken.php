<?php

namespace NicklasW\PkmGoApi\Authentication;

class AccessToken {

    /**
     * @var string
     */
    protected $token;

    /**
     * @var integer
     */
    protected $lifetime;

    /**
     * @var string
     */
    protected $freshToken;

    /**
     * AccessToken constructor.
     *
     * @param string  $token
     * @param integer $lifetime
     * @param         $freshToken
     */
    public function __construct($token, $lifetime = null, $freshToken = null)
    {
        $this->token = $token;
        $this->lifetime = $lifetime;
        $this->freshToken = $freshToken;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return int
     */
    public function getLifetime()
    {
        return $this->lifetime;
    }

    /**
     * @param int $lifetime
     */
    public function setLifetime($lifetime)
    {
        $this->lifetime = $lifetime;
    }

    /**
     * @return mixed
     */
    public function getFreshToken()
    {
        return $this->freshToken;
    }

    /**
     * @param mixed $freshToken
     */
    public function setFreshToken($freshToken)
    {
        $this->freshToken = $freshToken;
    }

}