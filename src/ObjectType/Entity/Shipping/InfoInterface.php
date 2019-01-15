<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping;

/**
 * Class InfoInterface
 * @package Frenet\ObjectType\Entity\Shipping
 */
interface InfoInterface
{
    /**
     * @var string
     */
    const FIELD_AVAILABLE_SHIPPING_SERVICES = 'available_shipping_services';

    /**
     * @return array
     */
    public function getAvailableShippingServices();
}
