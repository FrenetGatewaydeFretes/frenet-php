<?php

declare(strict_types = 1);

namespace Frenet\Config;

/**
 * Class Service
 *
 * @package Frenet\Config
 */
class Service implements ConfigInterface
{
    /**
     * @var string
     */
    private $protocol = 'http';

    /**
     * @var string
     */
    private $host = 'api.frenet.com.br';

    /**
     * @return string
     */
    public function getProtocol()
    {
        return (string) $this->protocol;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return (string) $this->host;
    }
}
