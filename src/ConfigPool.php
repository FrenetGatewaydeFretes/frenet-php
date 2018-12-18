<?php

declare(strict_types = 1);

namespace Frenet;

/**
 * Class Config
 *
 * @package Frenet
 */
class ConfigPool
{
    /**
     * @var Config\Credentials
     */
    private $credentials;
    
    /**
     * ConfigPool constructor.
     *
     * @param Config\Credentials $credentials
     */
    public function __construct(
        Config\Credentials $credentials
    ) {
        $this->credentials = $credentials;
    }
    
    /**
     * @return Config\Credentials
     */
    public function credentials()
    {
        return $this->credentials;
    }
}
