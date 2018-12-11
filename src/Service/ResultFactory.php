<?php

declare(strict_types = 1);

namespace Frenet\Service;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class ResultFactory
 * @package Frenet\Service
 */
class ResultFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = ResultInterface::class;
}
