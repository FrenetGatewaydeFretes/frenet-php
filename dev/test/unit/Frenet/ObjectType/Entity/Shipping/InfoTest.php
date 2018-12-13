<?php

declare(strict_types = 1);

namespace FrenetTest\ObjectType\Entity\Shipping;

use FrenetTest\TestCase;

/**
 * Class InfoTest
 * @package FrenetTest\ObjectType\Entity\Shipping
 */
class InfoTest extends TestCase
{
    
    /**
     * @var \Frenet\ObjectType\Entity\Shipping\InfoInterface
     */
    private $object;
    
    /**
     * @var array
     */
    private $data = [
        'ShippingSeviceAvailableArray' => [
            [
                'ServiceCode' => 'RTE1',
                'ServiceDescription' => 'Rodonaves',
                'Carrier' => 'Rodonaves',
                'CarrierCode' => 'RTE'
            ], [
                'ServiceCode' => 'RTE2',
                'ServiceDescription' => 'Correios',
                'Carrier' => 'Correios',
                'CarrierCode' => 'RTE2'
            ]
        ]
    ];
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\ObjectType\Entity\Shipping\InfoInterface::class, [
            'data' => $this->data
        ]);
    }
    
    /**
     * @test
     */
    public function getAvailableShippingServices()
    {
        $expected = [
            $this->createObject(\Frenet\ObjectType\Entity\Shipping\Info\ServiceInterface::class, ['data' => [
                'ServiceCode' => 'RTE1',
                'ServiceDescription' => 'Rodonaves',
                'Carrier' => 'Rodonaves',
                'CarrierCode' => 'RTE'
            ]]),
            $this->createObject(\Frenet\ObjectType\Entity\Shipping\Info\ServiceInterface::class, ['data' => [
                'ServiceCode' => 'RTE2',
                'ServiceDescription' => 'Correios',
                'Carrier' => 'Correios',
                'CarrierCode' => 'RTE2'
            ]])
        ];
        
        $this->assertEquals($expected, $this->object->getAvailableShippingServices());
    }
}
