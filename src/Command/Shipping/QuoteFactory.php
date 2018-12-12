<?php

declare(strict_types = 1);

namespace Frenet\Command\Shipping;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class QuoteFactory
 * @package Frenet\Shipping
 */
class QuoteFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = QuoteInterface::class;
}
