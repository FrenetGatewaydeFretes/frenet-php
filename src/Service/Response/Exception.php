<?php

declare(strict_types = 1);

namespace Frenet\Service\Response;

use Frenet\Framework\Http\Response\ResponseExceptionAbstract;

/**
 * Class Exception
 * @package Frenet\Service\Response
 */
class Exception extends ResponseExceptionAbstract
{
    /**
     * @var \Exception
     */
    private $exception;

    /**
     * Exception constructor.
     * @param \Exception $exception
     */
    public function __construct(
        \Exception $exception
    ) {
        $this->exception = $exception;
    }
}
