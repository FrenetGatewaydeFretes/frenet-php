<?php

declare(strict_types = 1);

namespace Frenet\Config;

/**
 * Class Credentials
 *
 * @package Frenet\Config
 */
class Credentials implements ConfigInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * @return string
     */
    public function getToken()
    {
        return (string) $this->token;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }
}
