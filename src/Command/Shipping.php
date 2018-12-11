<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class Shipping
 * @package Frenet\Command
 */
class Shipping implements ShippingInterface
{
    
    /**
     * @return mixed
     */
    public function info()
    {
        // TODO: Implement info() method.
    }
    
    /**
     * @return mixed
     */
    public function quote($fromPostcode, $toPostcode, $shipimentInvoiceValue, array $items, $country)
    {
        // TODO: Implement quote() method.
    }
}
