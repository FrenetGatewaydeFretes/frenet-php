<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class ChatFactory
 *
 * @package Frenet\ObjectType\Entity
 */
class AddressFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = AddressInterface::class;
}
