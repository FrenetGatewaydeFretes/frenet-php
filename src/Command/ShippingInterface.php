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
     * @return \Frenet\ObjectType\Entity\Shipping\InfoInterface
     */
    public function info();
    
    /**
     * @return mixed
     */
    public function quote($fromPostcode, $toPostcode, $shipmentInvoiceValue, array $items, $country);
}
