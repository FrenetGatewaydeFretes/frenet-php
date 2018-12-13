<?php

declare(strict_types = 1);

namespace FrenetTest\ObjectType\Entity\Shipping\Info;

use FrenetTest\TestCase;

/**
 * Class ServiceTest
 * @package FrenetTest\ObjectType\Entity\Shipping\Info
 */
class ServiceTest extends TestCase
{
    /**
     * @var \Frenet\ObjectType\Entity\Shipping\Info\ServiceInterface
     */
    private $object;
    
    /**
     * @var array
     */
    private $data = [
        'ServiceCode' => 'UPS',
        'ServiceDescription' => 'Shipping with UPS Service.',
        'Carrier' => 'SomeCarrier',
        'CarrierCode' => 'SomeCarrierCode',
    ];
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\ObjectType\Entity\Shipping\Info\ServiceInterface::class, [
            'data' => $this->data
        ]);
    }
    
    /**
     * @test
     */
    public function getServiceCode()
    {
        $this->assertEquals('UPS', $this->object->getServiceCode());
    }
    
    /**
     * @test
     */
    public function getServiceDescription()
    {
        $this->assertEquals('Shipping with UPS Service.', $this->object->getServiceDescription());
    }
    
    /**
     * @test
     */
    public function getCarrier()
    {
        $this->assertEquals('SomeCarrier', $this->object->getCarrier());
    }
    
    /**
     * @test
     */
    public function getCarrierCode()
    {
        $this->assertEquals('SomeCarrierCode', $this->object->getCarrierCode());
    }
}
