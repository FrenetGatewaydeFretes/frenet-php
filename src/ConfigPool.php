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

    /**
     * @var Config\Debugger
     */
    private $debugger;

    public function __construct(
        Config\Credentials $credentials,
        Config\Service $service,
        Config\Debugger $debugger
    ) {
        $this->credentials = $credentials;
        $this->service = $service;
        $this->debugger = $debugger;
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

    /**
     * @return Config\Debugger
     */
    public function debugger()
    {
        return $this->debugger;
    }
}
