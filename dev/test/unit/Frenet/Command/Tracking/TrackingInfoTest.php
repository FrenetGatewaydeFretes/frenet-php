<?php

declare(strict_types = 1);

namespace FrenetTest\Command\Tracking;

use FrenetTest\TestCase;
use Frenet\Command\Tracking\TrackingInfoInterface;

/**
 * Class QuoteTest
 * @package FrenetTest\Command\Shipping
 */
class QuoteTest extends TestCase
{
    
    /**
     * @test
     */
    public function toArray()
    {
        /** @var TrackingInfoInterface $object */
        $object = $this->createObject(TrackingInfoInterface::class);
        
        $this->assertInstanceOf(TrackingInfoInterface::class, $object->setShippingServiceCode('1234'));
        $this->assertInstanceOf(TrackingInfoInterface::class, $object->setTrackingNumber('12345ABCDE'));
        $this->assertInstanceOf(TrackingInfoInterface::class, $object->setInvoiceNumber('06395010'));
        $this->assertInstanceOf(TrackingInfoInterface::class, $object->setInvoiceSerie('ABCDE'));
        $this->assertInstanceOf(TrackingInfoInterface::class, $object->setRecipientDocument('DOCUMENT NUMBER'));
        $this->assertInstanceOf(TrackingInfoInterface::class, $object->setOrderNumber('987654'));
    }
}
