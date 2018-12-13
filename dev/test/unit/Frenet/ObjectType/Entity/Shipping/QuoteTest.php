<?php

declare(strict_types = 1);

namespace FrenetTest\ObjectType\Entity\Shipping;

use FrenetTest\TestCase;

/**
 * Class QuoteTest
 * @package FrenetTest\ObjectType\Entity\Shipping
 */
class QuoteTest extends TestCase
{
    
    /**
     * @var \Frenet\ObjectType\Entity\Shipping\QuoteInterface
     */
    private $object;
    
    /**
     * @var array
     */
    private $data = [
        'ShippingSevicesArray' => [
            [
                "ServiceCode" => "04014",
                "ServiceDescription" => "Sedex",
                "Carrier" => "Correios",
                "ShippingPrice" => "29.44",
                "DeliveryTime" => "5",
                "Error" => false,
                "OriginalDeliveryTime" => "5",
                "OriginalShippingPrice" => "29.440000",
                "ResponseTime" => "32.3168"
            ], [
                "ServiceCode" => "04510",
                "ServiceDescription" => "PAC",
                "Carrier" => "Correios",
                "ShippingPrice" => "31.64",
                "DeliveryTime" => "7",
                "Error" => false,
                "OriginalDeliveryTime" => "7",
                "OriginalShippingPrice" => "31.640000",
                "ResponseTime" => "39.2526"
            ], [
                "ServiceCode" => "RTE1",
                "ServiceDescription" => "Rodonaves",
                "Carrier" => "Rodonaves",
                "ShippingPrice" => "72.44",
                "DeliveryTime" => "1",
                "Error" => false,
                "OriginalDeliveryTime" => "1",
                "OriginalShippingPrice" => "72.440000",
                "ResponseTime" => "15.3861"
            ]
        ]
    ];
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\ObjectType\Entity\Shipping\QuoteInterface::class, [
            'data' => $this->data
        ]);
    }
    
    /**
     * @test
     */
    public function getAvailableShippingServices()
    {
        $expected = [
            $this->createObject(\Frenet\ObjectType\Entity\Shipping\Quote\ServiceInterface::class, [
                'data' => [
                    "ServiceCode" => "04014",
                    "ServiceDescription" => "Sedex",
                    "Carrier" => "Correios",
                    "ShippingPrice" => "29.44",
                    "DeliveryTime" => "5",
                    "Error" => false,
                    "OriginalDeliveryTime" => "5",
                    "OriginalShippingPrice" => "29.440000",
                    "ResponseTime" => "32.3168"
                ]
            ]),
            $this->createObject(\Frenet\ObjectType\Entity\Shipping\Quote\ServiceInterface::class, [
                'data' => [
                    "ServiceCode" => "04510",
                    "ServiceDescription" => "PAC",
                    "Carrier" => "Correios",
                    "ShippingPrice" => "31.64",
                    "DeliveryTime" => "7",
                    "Error" => false,
                    "OriginalDeliveryTime" => "7",
                    "OriginalShippingPrice" => "31.640000",
                    "ResponseTime" => "39.2526"
                ]
            ]),
            $this->createObject(\Frenet\ObjectType\Entity\Shipping\Quote\ServiceInterface::class, [
                'data' => [
                    "ServiceCode" => "RTE1",
                    "ServiceDescription" => "Rodonaves",
                    "Carrier" => "Rodonaves",
                    "ShippingPrice" => "72.44",
                    "DeliveryTime" => "1",
                    "Error" => false,
                    "OriginalDeliveryTime" => "1",
                    "OriginalShippingPrice" => "72.440000",
                    "ResponseTime" => "15.3861"
                ]
            ])
        ];
        
        $this->assertEquals($expected, $this->object->getShippingServices());
    }
}
