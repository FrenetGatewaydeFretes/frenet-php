<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Tracking;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class TrackingInfoFactory
 * @package Frenet\ObjectType\Entity\Tracking
 */
class TrackingInfoFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = TrackingInfoInterface::class;
}
