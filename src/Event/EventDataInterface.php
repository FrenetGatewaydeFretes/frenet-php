<?php

declare(strict_types = 1);

namespace Frenet\Event;

/**
 * Class EventDataInterface
 *
 * @package Frenet\Event
 */
interface EventDataInterface
{
    /**
     * @return string
     */
    public function getEventName();
    
    /**
     * @param string $name
     * @param array  $eventData
     *
     * @return $this
     */
    public function setEvent($name, array $eventData = []);
}
