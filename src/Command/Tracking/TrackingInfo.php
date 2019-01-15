<?php

declare(strict_types = 1);

namespace Frenet\Command\Tracking;

use Frenet\Command\CommandAbstract;

/**
 * Class TrackingInfo
 * @package Frenet\Command\Tracking
 */
class TrackingInfo extends CommandAbstract implements TrackingInfoInterface
{
    /**
     * {@inheritdoc}
     */
    protected $urlPath = 'tracking/trackinginfo';

    /**
     * {@inheritdoc}
     */
    protected $requestMethod = self::REQUEST_METHOD_POST;

    public function __construct(
        \Frenet\Service\ConnectionInterface $connection,
        \Frenet\Framework\Data\SerializerInterface $serializer,
        \Frenet\ObjectType\Entity\Tracking\TrackingInfoFactory $typeFactory
    ) {
        parent::__construct($connection, $serializer, $typeFactory);
    }

    /**
     * @inheritdoc
     */
    public function setShippingServiceCode($code)
    {
        return $this->setData(self::FIELD_SHIPPING_SERVICE_CODE, $code);
    }

    /**
     * @inheritdoc
     */
    public function setTrackingNumber($number)
    {
        return $this->setData(self::FIELD_TRACKING_NUMBER, $number);
    }

    /**
     * @inheritdoc
     */
    public function setInvoiceNumber($number)
    {
        return $this->setData(self::FIELD_INVOICE_NUMBER, $number);
    }

    /**
     * @inheritdoc
     */
    public function setInvoiceSerie($serie)
    {
        return $this->setData(self::FIELD_INVOICE_SERIE, $serie);
    }

    /**
     * @inheritdoc
     */
    public function setRecipientDocument($document)
    {
        return $this->setData(self::FIELD_RECIPIENT_DOCUMENT, $document);
    }

    /**
     * @inheritdoc
     */
    public function setOrderNumber($number)
    {
        return $this->setData(self::FIELD_ORDER_NUMBER, $number);
    }
}
