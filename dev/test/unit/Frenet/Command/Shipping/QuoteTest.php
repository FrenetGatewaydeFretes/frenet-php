<?php

declare(strict_types = 1);

namespace FrenetTest\Command\Shipping;

use FrenetTest\TestCase;
use Frenet\Command\Shipping\QuoteInterface;

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
        /** @var QuoteInterface $object */
        $object = $this->createObject(QuoteInterface::class);
        
        $this->assertInstanceOf(QuoteInterface::class, $object->setRecipientCountry('BR'));
        $this->assertInstanceOf(QuoteInterface::class, $object->setShipmentInvoiceValue(15.99));
        $this->assertInstanceOf(QuoteInterface::class, $object->setRecipientPostcode('06395-010'));
        $this->assertInstanceOf(QuoteInterface::class, $object->setSellerPostcode('06395-000'));
        $this->assertInstanceOf(QuoteInterface::class, $object->addShippingItem('SKU1', 4, 12, 13, 14, 15, 'unknown'));
        
        $expected = [
            'RecipientCountry' => 'BR',
            'ShipmentInvoiceValue' => 15.99,
            'RecipientCEP' => '06395-010',
            'SellerCEP' => '06395-000',
            'ShippingItemArray' => [
                [
                    'SKU' => 'SKU1',
                    'Weight' => 12,
                    'Length' => 13,
                    'Height' => 14,
                    'Width' => 15,
                    'Quantity' => 4,
                    'Category' => 'unknown',
                    'isFragile' => false
                ]
            ]
        ];
        
        $this->assertEquals($expected, $object->toArray());
    }
}
