<?php

declare(strict_types = 1);

namespace Frenet\Framework\Http\Response;

/**
 * Class ResponseAbstract
 * @package Frenet\Framework\Http\Response
 */
abstract class ResponseAbstract implements ResponseInterface
{
    /**
     * @return bool
     */
    public function canParse()
    {
        return (bool) $this->success();
    }
}
