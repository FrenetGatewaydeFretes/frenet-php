<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping\Info;

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
        'ServiceCode'        => self::FIELD_SERVICE_CODE,
        'ServiceDescription' => self::FIELD_SERVICE_DESCRIPTION,
        'Carrier'            => self::FIELD_CARRIER,
        'CarrierCode'        => self::FIELD_CARRIER_CODE,
    ];

    /**
     * {@inheritdoc}
     */
    public function getServiceCode()
    {
        return (string) $this->getData(self::FIELD_SERVICE_CODE);
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceDescription()
    {
        return (string) $this->getData(self::FIELD_SERVICE_DESCRIPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function getCarrier()
    {
        return (string) $this->getData(self::FIELD_CARRIER);
    }

    /**
     * {@inheritdoc}
     */
    public function getCarrierCode()
    {
        return (string) $this->getData(self::FIELD_CARRIER_CODE);
    }
}
