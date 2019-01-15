<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Postcode;

use Frenet\ObjectType\EntityAbstract;

/**
 * Class Address
 * @package Frenet\ObjectType\Entity\Postcode
 */
class Address extends EntityAbstract implements AddressInterface
{
    /**
     * @var array
     */
    protected $fieldMapping = [
        'CEP'      => self::FIELD_POSTCODE,
        'UF'       => self::FIELD_REGION,
        'City'     => self::FIELD_CITY,
        'District' => self::FIELD_DISTRICT,
        'Street'   => self::FIELD_STREET,
    ];

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->getData(self::FIELD_POSTCODE);
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->getData(self::FIELD_REGION);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getData(self::FIELD_CITY);
    }

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->getData(self::FIELD_DISTRICT);
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->getData(self::FIELD_STREET);
    }
}
