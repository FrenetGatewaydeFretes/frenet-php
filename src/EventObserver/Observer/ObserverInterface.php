<?php

declare(strict_types = 1);

namespace Frenet\EventObserver\Observer;

use Frenet\EventObserver\EventInterface;

/**
 * Class ObserverInterface
 *
 * @package Frenet\Event\Observer
 */
interface ObserverInterface
{
    /**
     * @param EventInterface $event
     */
    public function execute(EventInterface $event);
}
