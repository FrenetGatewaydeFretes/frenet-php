<?php

declare(strict_types = 1);

namespace Frenet\Command\Shipping;

/**
 * Class QuoteInterface
 * @package Frenet\Command\Shipping
 */
interface QuoteInterface
{
    /**
     * @var string
     */
    const FIELD_SELLER_POSTCODE = 'SellerCEP';

    /**
     * @var string
     */
    const FIELD_RECIPIENT_POSTCODE = 'RecipientCEP';

    /**
     * @var string
     */
    const FIELD_SHIPMENT_INVOICE_VALUE = 'ShipmentInvoiceValue';

    /**
     * @var string
     */
    const FIELD_RECIPIENT_COUNTRY = 'RecipientCountry';

    /**
     * Yes, there's a typo here.
     * @var string
     */
    const FIELD_COUPON = 'Coupom';

    /**
     * @var string
     */
    const FIELD_ITEMS = 'ShippingItemArray';

    /**
     * @var string
     */
    const FIELD_ITEM_WEIGHT = 'Weight';

    /**
     * @var string
     */
    const FIELD_ITEM_LENGTH = 'Length';

    /**
     * @var string
     */
    const FIELD_ITEM_HEIGHT = 'Height';

    /**
     * @var string
     */
    const FIELD_ITEM_WIDTH = 'Width';

    /**
     * @var string
     */
    const FIELD_ITEM_QUANTITY = 'Quantity';

    /**
     * @var string
     */
    const FIELD_ITEM_SKU = 'SKU';

    /**
     * @var string
     */
    const FIELD_ITEM_CATEGORY = 'Category';

    /**
     * @var string
     */
    const FIELD_ITEM_IS_FRAGILE = 'isFragile';

    /**
     * @var string
     */
    const SHIPPING_SERVICE_CODE = 'ShippingServiceCode';

    /**
     * @param string $postcode
     *
     * @return $this
     */
    public function setSellerPostcode($postcode);

    /**
     * @param string $postcode
     *
     * @return $this
     */
    public function setRecipientPostcode($postcode);

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setShipmentInvoiceValue($value);

    /**
     * @param string  $sku
     * @param integer $qty
     * @param float   $weight
     * @param float   $length
     * @param float   $height
     * @param float   $width
     * @param string  $category
     * @param bool    $isFragile
     *
     * @return $this
     */
    public function addShippingItem($sku, $qty, $weight, $length, $height, $width, $category, $isFragile = false);

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setRecipientCountry($country);

    /**
     * @param string $couponCode
     *
     * @return $this
     */
    public function setCouponCode($couponCode);

    /**
     * @param string $ShippingServiceCode
     *
     * @return $this
     */
    public function setShippingServiceCode($ShippingServiceCode);
}
