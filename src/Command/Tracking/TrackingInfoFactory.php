<?php

namespace Frenet\Command\Tracking;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class TrackingInfoFactory
 * @package Frenet\Command\Tracking
 */
class TrackingInfoFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = TrackingInfoInterface::class;
}
