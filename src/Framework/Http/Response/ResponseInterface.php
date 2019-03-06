<?php

declare(strict_types = 1);

namespace Frenet\Framework\Http\Response;

/**
 * Interface ResponseInterface
 * @package Frenet\Framework\Http\Response
 */
interface ResponseInterface
{
    /**
     * @return string|array
     */
    public function getBody();

    /**
     * @return bool
     */
    public function success();

    /**
     * @return bool
     */
    public function exception();

    /**
     * @return bool
     */
    public function canParse();
}
