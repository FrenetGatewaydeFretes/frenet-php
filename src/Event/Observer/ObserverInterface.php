<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

use Frenet\Event\EventDataInterface;

/**
 * Class ObserverInterface
 *
 * @package Frenet\Event\Observer
 */
interface ObserverInterface
{
    /**
     * @param EventDataInterface $event
     */
    public function execute(EventDataInterface $event);
}
