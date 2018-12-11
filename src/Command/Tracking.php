<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class Tracking
 * @package Frenet\Command
 */
class Tracking implements TrackingInterface
{
    /**
     * @return mixed
     */
    public function trackingInfo($shippingServiceCode = null, $trackingNumber = null, $invoiceNumber = null, $invoiceSerie = null, $recipientDocument = null, $orderNumber = null)
    {
        // TODO: Implement trackingInfo() method.
    }
}
