<?php

declare(strict_types = 1);

namespace Frenet\Config;

use Frenet\Framework\Exception\WrongDataTypeException;

/**
 * Class Service
 *
 * @package Frenet\Config
 */
class Service implements ConfigInterface
{
    /**
     * @var array
     */
    private $validProtocols = [
        'http', 'https'
    ];

    /**
     * @var string
     */
    private $protocol = 'http';

    /**
     * @var string
     */
    private $defaultHost = 'api.frenet.com.br';

    /**
     * @var string
     */
    private $host = null;

    /**
     * @var float
     */
    private $timeout = 30.0;

    /**
     * @var float
     */
    private $connectTimeout = 10.0;

    /**
     * @return string
     */
    public function getProtocol()
    {
        return (string) $this->protocol;
    }

    /**
     * @param string $protocol
     *
     * @return $this
     *
     * @throws WrongDataTypeException
     */
    public function setProtocol($protocol)
    {
        $protocol = trim(strtolower($protocol));

        if (!$this->validateProtocol($protocol)) {
            throw new WrongDataTypeException('Invalid protocol provided.');
        }

        $this->protocol = $protocol;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->getHostname();
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        if (empty($this->host)) {
            return $this->defaultHost;
        }

        return (string) $this->normalizeHostname($this->host);
    }

    /**
     * @param string $host
     *
     * @return $this
     *
     * @throws WrongDataTypeException
     */
    public function setHostname($host)
    {
        if (!$this->validateHostname($host)) {
            throw new WrongDataTypeException('Invalid hostname format provided.');
        }

        $this->host = $this->normalizeHostname($host);

        return $this;
    }

    /**
     * Total time, in seconds, a request to the API may take before it is aborted.
     *
     * @return float
     */
    public function getTimeout()
    {
        return (float) $this->timeout;
    }

    /**
     * @param int|float|string $seconds
     *
     * @return $this
     *
     * @throws WrongDataTypeException
     */
    public function setTimeout($seconds)
    {
        if (!$this->validateTimeout($seconds)) {
            throw new WrongDataTypeException('Invalid timeout provided.');
        }

        $this->timeout = (float) $seconds;

        return $this;
    }

    /**
     * Time, in seconds, to wait for the connection to the API; never longer than the total timeout.
     *
     * @return float
     */
    public function getConnectTimeout()
    {
        return (float) min($this->connectTimeout, $this->timeout);
    }

    /**
     * @param int|float|string $seconds
     *
     * @return $this
     *
     * @throws WrongDataTypeException
     */
    public function setConnectTimeout($seconds)
    {
        if (!$this->validateTimeout($seconds)) {
            throw new WrongDataTypeException('Invalid connect timeout provided.');
        }

        $this->connectTimeout = (float) $seconds;

        return $this;
    }

    /**
     * @param mixed $seconds
     *
     * @return bool
     */
    private function validateTimeout($seconds)
    {
        return is_numeric($seconds) && (float) $seconds > 0;
    }

    /**
     * @param string $host
     *
     * @return bool
     */
    private function validateHostname($host)
    {
        $host = $this->normalizeHostname($host);

        if (empty($host)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $host
     *
     * @return string
     */
    private function normalizeHostname($host)
    {
        $host = trim($host);
        $host = strtolower($host);

        return $host;
    }

    /**
     * @param string $protocol
     *
     * @return bool
     */
    private function validateProtocol($protocol)
    {
        $protocol = strtolower($protocol);

        if (empty($protocol)) {
            return false;
        }

        if (!in_array($protocol, $this->validProtocols)) {
            return false;
        }

        return true;
    }
}
