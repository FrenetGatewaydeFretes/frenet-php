<?php

declare(strict_types = 1);

namespace Frenet\Command\Postcode;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class AddressFactory
 * @package Frenet\Postcode
 */
class AddressFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = AddressInterface::class;
}
