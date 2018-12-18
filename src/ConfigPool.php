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
     * @var Config\Service
     */
    private $service;
    
    public function __construct(
        Config\Credentials $credentials,
        Config\Service $service
    ) {
        $this->credentials = $credentials;
        $this->service = $service;
    }
    
    /**
     * @return Config\Credentials
     */
    public function credentials()
    {
        return $this->credentials;
    }
    
    /**
     * @return Config\Service
     */
    public function service()
    {
        return $this->service;
    }
}
