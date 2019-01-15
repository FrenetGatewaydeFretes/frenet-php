<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping\Info;

/**
 * Class ServiceInterface
 * @package Frenet\ObjectType\Entity\Shipping\Info
 */
interface ServiceInterface
{
    /**
     * @var string
     */
    const FIELD_SERVICE_CODE = 'service_code';

    /**
     * @var string
     */
    const FIELD_SERVICE_DESCRIPTION = 'service_description';

    /**
     * @var string
     */
    const FIELD_CARRIER = 'carrier';

    /**
     * @var string
     */
    const FIELD_CARRIER_CODE = 'carrier_code';

    /**
     * @return string
     */
    public function getServiceCode();

    /**
     * @return string
     */
    public function getServiceDescription();

    /**
     * @return string
     */
    public function getCarrier();

    /**
     * @return string
     */
    public function getCarrierCode();
}
