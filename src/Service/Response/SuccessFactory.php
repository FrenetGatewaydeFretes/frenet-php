<?php

declare(strict_types = 1);

namespace Frenet\Service\Response;

use Frenet\Framework\Http\Response\ResponseSuccessInterface;
use Frenet\Framework\Object\FactoryAbstract;

/**
 * Class SuccessFactory
 * @package Frenet\Service\Response
 */
class SuccessFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = ResponseSuccessInterface::class;
}
