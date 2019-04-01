<?php

namespace Frenet\ObjectType\Entity\Shipping;

/**
 * Class QuoteInterface
 * @package Frenet\ObjectType\Entity\Shipping
 */
interface QuoteInterface
{
    /**
     * @var string
     */
    const FIELD_SHIPPING_SERVICES = 'shipping_services';

    /**
     * @return array
     */
    public function getShippingServices();
}
