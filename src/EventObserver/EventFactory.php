<?php

declare(strict_types = 1);

namespace Frenet\EventObserver;

/**
 * Class EventDataFactory
 *
 * @package Frenet\Event
 */
class EventFactory
{
    /**
     * @return Event
     */
    public function create()
    {
        return new Event();
    }
}
