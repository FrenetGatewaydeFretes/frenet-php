<?php

declare(strict_types = 1);

namespace Frenet\Event;

use Frenet\Event\Observer\ObserverInterface;

/**
 * Class EventDispatcherInterface
 *
 * @package Frenet\Event
 */
interface EventDispatcherInterface
{
    /**
     * @param string $eventName
     * @param array  $eventData
     *
     * @return void
     */
    public function dispatch($eventName, array $eventData = []);
    
    /**
     * @param ObserverInterface $observer
     *
     * @return $this
     */
    public function addObserver(ObserverInterface $observer);
}
