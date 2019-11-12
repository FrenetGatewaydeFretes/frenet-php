<?php

declare(strict_types = 1);

namespace FrenetTest\ObjectType\Entity\Shipping\Quote;

use FrenetTest\TestCase;

/**
 * Class ServiceTest
 *
 * @package FrenetTest\ObjectType\Entity\Shipping\Quote
 */
class ServiceTest extends TestCase
{
    /**
     * @var \Frenet\ObjectType\Entity\Shipping\Quote\ServiceInterface
     */
    private $object;

    /**
     * @var array
     */
    private $data = [
        'ServiceCode'           => '04014',
        'ServiceDescription'    => 'Shipping using Correios company.',
        'Carrier'               => 'CorreiosCarrier',
        'ShippingPrice'         => '10.89',
        'OriginalShippingPrice' => '17.12',
        'DeliveryTime'          => '5',
        'OriginalDeliveryTime'  => 7,
        'Error'                 => 'false',
        'ResponseTime'          => 3.7865,
        'Msg'                   => 'Erro: Peso excedido.',
    ];

    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\ObjectType\Entity\Shipping\Quote\ServiceInterface::class, [
            'data' => $this->data
        ]);
    }

    /**
     * @test
     */
    public function getServiceCode()
    {
        $this->assertEquals('04014', $this->object->getServiceCode());
    }

    /**
     * @test
     */
    public function getServiceDescription()
    {
        $this->assertEquals('Shipping using Correios company.', $this->object->getServiceDescription());
    }

    /**
     * @test
     */
    public function getCarrier()
    {
        $this->assertEquals('CorreiosCarrier', $this->object->getCarrier());
    }

    /**
     * @test
     */
    public function getShippingPrice()
    {
        $this->assertEquals(10.89, $this->object->getShippingPrice());
    }

    /**
     * @test
     */
    public function getOriginalShippingPrice()
    {
        $this->assertEquals(17.12, $this->object->getOriginalShippingPrice());
    }

    /**
     * @test
     */
    public function getDeliveryTime()
    {
        $this->assertEquals(5, $this->object->getDeliveryTime());
    }

    /**
     * @test
     */
    public function getOriginalDeliveryTime()
    {
        $this->assertEquals(7, $this->object->getOriginalDeliveryTime());
    }

    /**
     * @test
     */
    public function isError()
    {
        $this->assertFalse($this->object->isError());
        $this->object->setData('error', true);
        $this->assertTrue($this->object->isError());
        $this->object->setData('error', 'true');
        $this->assertTrue($this->object->isError());
        $this->object->setData('error', 'false');
        $this->assertFalse($this->object->isError());
    }

    /**
     * @test
     */
    public function getResponseTime()
    {
        $this->assertEquals(3.7865, $this->object->getResponseTime());
    }

    /**
     * @test
     */
    public function getMessage()
    {
        $this->assertEquals('Erro: Peso excedido.', $this->object->getMessage());
    }
}
