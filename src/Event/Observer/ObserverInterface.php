<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

use Frenet\Event\EventInterface;

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
