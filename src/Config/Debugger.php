<?php

declare(strict_types = 1);

namespace Frenet\Config;

/**
 * Class Debugger
 *
 * @package Frenet\Config
 */
class Debugger implements ConfigInterface
{
    /**
     * @var bool
     */
    private $enabled = false;

    /**
     * @var string
     */
    private $filename = 'frenet_request_result.log';

    /**
     * @var string
     */
    private $filePath = null;

    /**
     * @param null|bool $flag
     *
     * @return $this|bool
     */
    public function isEnabled($flag = null)
    {
        if (null === $flag) {
            return $this->enabled;
        }

        if (true === (bool) $flag) {
            $this->enabled = true;
            return $this;
        }

        $this->enabled = false;
        return $this;
    }

    /**
     * @param string $filename
     *
     * @return $this
     */
    public function setFilename($filename)
    {
        if ($this->validateFilename($filename)) {
            $this->filename = $filename;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getFullFilename()
    {
        return $this->getFilePath() . DIRECTORY_SEPARATOR . $this->getFilename();
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setFilePath($path)
    {
        if ($this->validateFilePath($path)) {
            $this->filePath = $path;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return rtrim((string) $this->filePath, DIRECTORY_SEPARATOR);
    }

    /**
     * @param string $filename
     *
     * @return bool
     */
    private function validateFilename($filename)
    {
        if (empty($filename)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $filename
     *
     * @return bool
     */
    private function validateFilePath($filePath)
    {
        if (empty($filePath)) {
            return false;
        }

        if (!is_dir($filePath)) {
            return false;
        }

        if (!is_readable($filePath)) {
            return false;
        }

        return true;
    }
}
