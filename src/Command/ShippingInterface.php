<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class ShippingInterface
 * @package Frenet\Command
 */
interface ShippingInterface
{
    /**
     * @return Shipping\InfoInterface|CommandInterface
     */
    public function info();

    /**
     * @return Shipping\QuoteInterface|CommandInterface
     */
    public function quote();
}
