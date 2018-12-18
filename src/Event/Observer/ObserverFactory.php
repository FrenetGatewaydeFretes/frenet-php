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
    
    public function __construct(
        \Frenet\Framework\ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }
    
    public function createRequestResultLogger()
    {
        return $this->objectManager->create(RequestResultLogger::class);
    }
}
