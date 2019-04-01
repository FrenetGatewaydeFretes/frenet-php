<?php

namespace Frenet\Framework\Http\Response;

/**
 * Interface ResponseSuccessInterface
 * @package Frenet\Framework\Http\Response
 */
interface ResponseSuccessInterface extends ResponseInterface
{
    /**
     * @return array
     */
    public function getBody();
}
