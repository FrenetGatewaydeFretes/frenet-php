<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Interface CommandInterface
 * @package Frenet\Command
 */
interface CommandInterface
{
    /**
     * @var string
     */
    const REQUEST_METHOD_GET = 'GET';

    /**
     * @var string
     */
    const REQUEST_METHOD_POST = 'POST';

    /**
     * @var string
     */
    const REQUEST_METHOD_PUT = 'PUT';

    /**
     * @var string
     */
    const REQUEST_METHOD_HEAD = 'HEAD';

    /**
     * @return string
     */
    public function getUrlPath();

    /**
     * @return string
     */
    public function getRequestMethod();

    /**
     * @param array $optionalConfig
     * @return $this
     */
    public function setOptionalConfig(array $optionalConfig = []);

    /**
     * @return array
     */
    public function toArray();

    /**
     * @return array
     */
    public function toJson();

    /**
     * @return mixed
     */
    public function execute();
}
