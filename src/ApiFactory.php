<?php

namespace Frenet;

use Frenet\Framework\DI\ContainerRepository;

/**
 * Class ApiFactory
 * @package Frenet
 */
class ApiFactory
{

    /**
     * @var \DI\Container
     */
    private static $container;

    /**
     * @var array
     */
    private static $config = [
        'definitions' => FRENET_DIR_DI_CONFIG
    ];

    /**
     * @var array
     */
    private static $customConfig = [];

    /**
     * @param string $token
     * @param array  $config
     *
     * @return ApiInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function create($token, array $config = [])
    {
        if (!empty($config)) {
            /** If there's a customized configuration the application can load it. */
            self::$customConfig = (array) $config;
        }

        self::setupContainer();

        $api = self::createApiInstance($token);

        self::$container->set(Api::class, $api);

        return $api;
    }

    /**
     * @param string $token
     *
     * @return ApiInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    private static function createApiInstance($token)
    {
        return self::$container->make(ApiInterface::class, [
            'token' => $token,
        ]);
    }

    /**
     * Setup the container.
     *
     * @throws \Frenet\Framework\Exception\ExceptionInterface
     */
    private static function setupContainer()
    {
        self::$container = ContainerRepository::getInstance(self::getConfig());
    }

    /**
     * @return array
     */
    private static function getConfig()
    {
        $config = array_merge_recursive(self::$config, self::$customConfig);
        return $config;
    }
}
