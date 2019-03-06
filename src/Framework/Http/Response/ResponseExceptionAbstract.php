<?php

declare(strict_types = 1);

namespace Frenet\Framework\Http\Response;

/**
 * Class ResponseExceptionAbstract
 * @package Frenet\Framework\Http\Response
 */
abstract class ResponseExceptionAbstract extends ResponseAbstract implements ResponseExceptionInterface
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

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return (string) $this->exception->getMessage();
    }

    /**
     * @return bool
     */
    public function success()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function exception()
    {
        return true;
    }
}
