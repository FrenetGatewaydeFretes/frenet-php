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
    private $objectManager;
    
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
    public function getLogger($name)
    {
        /** @var \Psr\Log\LoggerInterface $logger */
        $logger = $this->objectManager->create(\Psr\Log\LoggerInterface::class, ['name' => $name]);
        return $logger;
    }
}
