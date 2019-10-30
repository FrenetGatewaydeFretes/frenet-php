<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping\Quote;

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
    const FIELD_SHIPPING_PRICE = 'shipping_price';

    /**
     * @var string
     */
    const FIELD_DELIVERY_TIME = 'delivery_time';

    /**
     * @var string
     */
    const FIELD_ERROR = 'error';

    /**
     * @var string
     */
    const FIELD_ORIGINAL_DELIVERY_TIME = 'original_delivery_time';

    /**
     * @var string
     */
    const FIELD_ORIGINAL_SHIPPING_PRICE = 'original_shipping_price';

    /**
     * @var string
     */
    const FIELD_RESPONSE_TIME = 'response_time';

    /**
     * @var string
     */
    const FIELD_MESSAGE = 'message';

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
     * @return float
     */
    public function getShippingPrice();

    /**
     * @return float
     */
    public function getOriginalShippingPrice();

    /**
     * @return integer
     */
    public function getDeliveryTime();

    /**
     * @return integer
     */
    public function getOriginalDeliveryTime();

    /**
     * @return boolean
     */
    public function isError();

    /**
     * @return float
     */
    public function getResponseTime();

    /**
     * @return string
     */
    public function getMessage();
}
