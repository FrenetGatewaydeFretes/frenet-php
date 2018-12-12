<?php

declare(strict_types = 1);

namespace Frenet\Command\Shipping;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class InfoFactory
 * @package Frenet\Shipping
 */
class InfoFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = InfoInterface::class;
}
