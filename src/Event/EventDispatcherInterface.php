<?php

declare(strict_types = 1);

namespace Frenet\Event;

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
}
