<?php

/**
 * @author DrDelay <info@vi0lation.de>
 */

namespace NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Parsers\Results;

class GoogleOAuthResult
{
    /** @var string|null */
    protected $refresh_token;

    /** @var string */
    protected $id_token;

    /** @var int */
    protected $expires_in;

    /**
     * GoogleOAuthResult constructor.
     *
     * @param string      $id_token
     * @param int         $expires_in
     * @param string|null $refresh_token
     */
    public function __construct($id_token, $expires_in, $refresh_token = null)
    {
        $this->id_token = $id_token;
        $this->expires_in = $expires_in;
        $this->refresh_token = $refresh_token;
    }

    /**
     * Returns the refresh token.
     *
     * @return null|string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * Returns the id token.
     *
     * @return string
     */
    public function getIdToken()
    {
        return $this->id_token;
    }

    /**
     * Returns the lifetime.
     *
     * @return int
     */
    public function getExpiresIn()
    {
        return $this->expires_in;
    }
}
