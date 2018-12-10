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
     * @return mixed
     */
    public function info();
    
    /**
     * @return mixed
     */
    public function quote($fromPostcode, $toPostcode, $shipimentInvoiceValue, array $items, $country);
}
