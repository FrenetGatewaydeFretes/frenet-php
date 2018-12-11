<?php

declare(strict_types = 1);

namespace Frenet\Service\Response;

use Frenet\Framework\Http\Response\ResponseExceptionInterface;
use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class ExceptionFactory
 * @package Frenet\Service\Response
 */
class ExceptionFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = ResponseExceptionInterface::class;
}
