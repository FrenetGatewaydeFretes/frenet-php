<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Tracking\TrackingInfo;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class EventFactory
 * @package Frenet\ObjectType\Entity\Tracking
 */
class EventFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = EventInterface::class;
}
