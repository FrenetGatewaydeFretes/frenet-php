<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class InfoFactory
 *
 * @package Frenet\ObjectType\Entity\Shipping
 */
class InfoFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = InfoInterface::class;
}
