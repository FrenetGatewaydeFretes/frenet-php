<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping\Quote;

use Frenet\ObjectType\EntityAbstract;

/**
 * Class Service
 *
 * @package Frenet\ObjectType\Entity\Shipping\Info
 */
class Service extends EntityAbstract implements ServiceInterface
{
    /**
     * @var array
     */
    protected $fieldMapping = [
        'ServiceCode'           => self::FIELD_SERVICE_CODE,
        'ServiceDescription'    => self::FIELD_SERVICE_DESCRIPTION,
        'Carrier'               => self::FIELD_CARRIER,
        'ShippingPrice'         => self::FIELD_SHIPPING_PRICE,
        'OriginalShippingPrice' => self::FIELD_ORIGINAL_SHIPPING_PRICE,
        'DeliveryTime'          => self::FIELD_DELIVERY_TIME,
        'OriginalDeliveryTime'  => self::FIELD_ORIGINAL_DELIVERY_TIME,
        'Error'                 => self::FIELD_ERROR,
        'ResponseTime'          => self::FIELD_RESPONSE_TIME,
        'Msg'                   => self::FIELD_MESSAGE,
    ];

    /**
     * @inheritdoc
     */
    public function getServiceCode()
    {
        return $this->getData(self::FIELD_SERVICE_CODE);
    }

    /**
     * @inheritdoc
     */
    public function getServiceDescription()
    {
        return $this->getData(self::FIELD_SERVICE_DESCRIPTION);
    }

    /**
     * @inheritdoc
     */
    public function getCarrier()
    {
        return $this->getData(self::FIELD_CARRIER);
    }

    /**
     * @inheritdoc
     */
    public function getShippingPrice()
    {
        return (float) $this->getData(self::FIELD_SHIPPING_PRICE);
    }

    /**
     * @inheritdoc
     */
    public function getOriginalShippingPrice()
    {
        return (float) $this->getData(self::FIELD_ORIGINAL_SHIPPING_PRICE);
    }

    /**
     * @inheritdoc
     */
    public function getDeliveryTime()
    {
        return (int) $this->getData(self::FIELD_DELIVERY_TIME);
    }

    /**
     * @inheritdoc
     */
    public function getOriginalDeliveryTime()
    {
        return (int) $this->getData(self::FIELD_ORIGINAL_DELIVERY_TIME);
    }

    /**
     * @inheritdoc
     */
    public function isError()
    {
        if ('true' === $this->getData(self::FIELD_ERROR)) {
            return true;
        }

        if (true === $this->getData(self::FIELD_ERROR)) {
            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function getResponseTime()
    {
        return (float) $this->getData(self::FIELD_RESPONSE_TIME);
    }

    /**
     * @inheritdoc
     */
    public function getMessage()
    {
        return (string) $this->getData(self::FIELD_MESSAGE);
    }
}
