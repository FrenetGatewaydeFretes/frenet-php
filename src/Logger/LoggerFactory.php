<?php

declare(strict_types = 1);

namespace Frenet\Logger;

/**
 * Class LoggerFactory
 *
 * @package Frenet\Logger
 */
class LoggerFactory
{
    /**
     * @var \Frenet\Framework\ObjectManager
     */
    private $objectManager;

    /**
     * LoggerFactory constructor.
     * @param \Frenet\Framework\ObjectManager $objectManager
     */
    public function __construct(
        \Frenet\Framework\ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * @param string $name
     *
     * @return \Psr\Log\LoggerInterface
     *
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function getLogger($name, $filename = null)
    {
        /** @var \Psr\Log\LoggerInterface $logger */
        $logger = $this->objectManager->create(\Psr\Log\LoggerInterface::class, ['name' => $name]);

        if ($filename) {
            $handler = new \Monolog\Handler\StreamHandler(
                $filename,
                \Monolog\Logger::DEBUG
            );
            $logger->pushHandler($handler);
        }

        return $logger;
    }
}
