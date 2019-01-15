<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

/**
 * Class ObserverFactory
 *
 * @package Frenet\Event\Observer
 */
class ObserverFactory
{
    /**
     * @var \Frenet\Framework\ObjectManager
     */
    private $objectManager;

    /**
     * ObserverFactory constructor.
     *
     * @param \Frenet\Framework\ObjectManager $objectManager
     */
    public function __construct(
        \Frenet\Framework\ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * @return RequestResultLogger
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public function createRequestResultLogger()
    {
        return $this->objectManager->create(RequestResultLogger::class);
    }
}
