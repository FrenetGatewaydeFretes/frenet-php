<?php

declare(strict_types = 1);

namespace Frenet\Framework\Object;

/**
 * Interface FactoryInterface
 * @package Frenet\Framework\Object
 */
interface FactoryInterface
{
    /**
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters = []);
}
