<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping\Info;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class ServiceFactory
 * @package Frenet\ObjectType\Entity\Shipping\Info
 */
class ServiceFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = ServiceInterface::class;
}
