<?php

declare(strict_types = 1);

namespace Frenet\Command\Shipping;

use Frenet\Command\CommandAbstract;

/**
 * Class Quote
 * @package Frenet\Command\Shipping
 */
class Quote extends CommandAbstract implements QuoteInterface
{
    /**
     * @inheritdoc
     */
    protected $urlPath = 'shipping/quote';

    /**
     * @inheritdoc
     */
    protected $requestMethod = self::REQUEST_METHOD_POST;

    /**
     * Quote constructor.
     *
     * @param \Frenet\Service\ConnectionInterface             $connection
     * @param \Frenet\Framework\Data\SerializerInterface      $serializer
     * @param \Frenet\ObjectType\Entity\Shipping\QuoteFactory $typeFactory
     */
    public function __construct(
        \Frenet\Service\ConnectionInterface $connection,
        \Frenet\Framework\Data\SerializerInterface $serializer,
        \Frenet\ObjectType\Entity\Shipping\QuoteFactory $typeFactory
    ) {
        parent::__construct($connection, $serializer, $typeFactory);
    }

    /**
     * @inheritdoc
     */
    public function setSellerPostcode($postcode)
    {
        return $this->setData(self::FIELD_SELLER_POSTCODE, $postcode);
    }

    /**
     * @inheritdoc
     */
    public function setRecipientPostcode($postcode)
    {
        return $this->setData(self::FIELD_RECIPIENT_POSTCODE, $postcode);
    }

    /**
     * @inheritdoc
     */
    public function setShipmentInvoiceValue($value)
    {
        return $this->setData(self::FIELD_SHIPMENT_INVOICE_VALUE, (float) $value);
    }

    /**
     * @inheritdoc
     */
    public function addShippingItem($sku, $qty, $weight, $length, $height, $width, $category, $isFragile = false)
    {
        $items = (array) $this->getData(self::FIELD_ITEMS);

        array_push($items, [
            self::FIELD_ITEM_SKU        => (string) $sku,
            self::FIELD_ITEM_WEIGHT     => (float) $weight,
            self::FIELD_ITEM_LENGTH     => (float) $length,
            self::FIELD_ITEM_HEIGHT     => (float) $height,
            self::FIELD_ITEM_WIDTH      => (float) $width,
            self::FIELD_ITEM_QUANTITY   => (int) max(1, $qty),
            self::FIELD_ITEM_CATEGORY   => (string) $category,
            self::FIELD_ITEM_IS_FRAGILE => (bool) $isFragile,
        ]);

        return $this->setData(self::FIELD_ITEMS, $items);
    }

    /**
     * @inheritdoc
     */
    public function setRecipientCountry($country)
    {
        return $this->setData(self::FIELD_RECIPIENT_COUNTRY, (string) $country);
    }

    /**
     * @inheritdoc
     */
    public function setCouponCode($couponCode)
    {
        return $this->setData(self::FIELD_COUPON, (string) $couponCode);
    }

    /**
     * @param string $ShippingServiceCode
     *
     * @return $this
     */
    public function setShippingServiceCode($ShippingServiceCode)
    {
        return $this->setData(self::SHIPPING_SERVICE_CODE, (string) $ShippingServiceCode);
    }
}
