<?php

declare(strict_types = 1);

namespace Frenet\Service;

use Frenet\Framework\Http\Response;
use Frenet\ObjectType\EntityInterface;

/**
 * Interface ResultInterface
 * @package Frenet\Service
 */
interface ResultInterface
{
    /**
     * @return Response\ResponseExceptionInterface|Response\ResponseSuccessInterface
     */
    public function getResponse();

    /**
     * @return EntityInterface
     */
    public function parse();
}
