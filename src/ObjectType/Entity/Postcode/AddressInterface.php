<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Postcode;

/**
 * Interface AddressInterface
 * @package Frenet\ObjectType\Entity
 */
interface AddressInterface
{
    /**
     * @var string
     */
    const FIELD_POSTCODE = 'postcode';

    /**
     * @var string
     */
    const FIELD_REGION = 'region';

    /**
     * @var string
     */
    const FIELD_CITY = 'city';

    /**
     * @var string
     */
    const FIELD_DISTRICT = 'district';

    /**
     * @var string
     */
    const FIELD_STREET = 'street';

    /**
     * @return string
     */
    public function getPostcode();

    /**
     * @return string
     */
    public function getRegion();

    /**
     * @return string
     */
    public function getCity();

    /**
     * @return string
     */
    public function getDistrict();

    /**
     * @return string
     */
    public function getStreet();
}
