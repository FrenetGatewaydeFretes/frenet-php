<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class QuoteFactory
 * @package Frenet\ObjectType\Entity\Shipping
 */
class QuoteFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = QuoteInterface::class;
}
