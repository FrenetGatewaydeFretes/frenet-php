<?php

declare(strict_types = 1);

namespace Frenet\Event;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class EventDataFactory
 *
 * @package Frenet\Event
 */
class EventDataFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = EventDataInterface::class;
}
