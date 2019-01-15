<?php

declare(strict_types = 1);

namespace Frenet\Command\Tracking;

/**
 * Class TrackingInfoInterface
 * @package Frenet\Command\Tracking
 */
interface TrackingInfoInterface
{
    /**
     * @var string
     */
    const FIELD_SHIPPING_SERVICE_CODE = 'ShippingServiceCode';

    /**
     * @var string
     */
    const FIELD_TRACKING_NUMBER = 'TrackingNumber';

    /**
     * @var string
     */
    const FIELD_INVOICE_NUMBER = 'InvoiceNumber';

    /**
     * @var string
     */
    const FIELD_INVOICE_SERIE = 'InvoiceSerie';

    /**
     * @var string
     */
    const FIELD_RECIPIENT_DOCUMENT = 'RecipientDocument';

    /**
     * @var string
     */
    const FIELD_ORDER_NUMBER = 'OrderNumber';

    /**
     * @param $code
     *
     * @return $this
     */
    public function setShippingServiceCode($code);

    /**
     * @param $number
     *
     * @return $this
     */
    public function setTrackingNumber($number);

    /**
     * @param $number
     *
     * @return $this
     */
    public function setInvoiceNumber($number);

    /**
     * @param $serie
     *
     * @return $this
     */
    public function setInvoiceSerie($serie);

    /**
     * @param $document
     *
     * @return $this
     */
    public function setRecipientDocument($document);

    /**
     * @param $number
     *
     * @return $this
     */
    public function setOrderNumber($number);
}
