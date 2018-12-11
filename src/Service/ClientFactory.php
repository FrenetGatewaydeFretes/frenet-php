<?php

declare(strict_types = 1);

namespace Frenet\Service;

use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class ClientFactory
 * @package Frenet\Service
 */
class ClientFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = \GuzzleHttp\ClientInterface::class;
}
