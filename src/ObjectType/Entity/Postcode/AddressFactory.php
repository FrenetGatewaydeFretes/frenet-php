<?php

namespace Frenet\ObjectType\Entity\Postcode;

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
