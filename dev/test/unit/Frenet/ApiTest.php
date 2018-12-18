<?php

declare(strict_types = 1);

namespace FrenetTest;

/**
 * Class ApiTest
 * @package FrenetTest
 */
class ApiTest extends TestCase
{
    /**
     * @var \Frenet\ApiInterface
     */
    private $api;
    
    protected function setUp()
    {
        $this->api = \Frenet\ApiFactory::create('someToken', ['test' => 'Test']);
    }
    
    /**
     * @test
     */
    public function postcode()
    {
        $this->assertInstanceOf(\Frenet\Command\PostcodeInterface::class, $this->api->postcode());
    }
    
    /**
     * @test
     */
    public function shipping()
    {
        $this->assertInstanceOf(\Frenet\Command\ShippingInterface::class, $this->api->shipping());
    }
    
    /**
     * @test
     */
    public function tracking()
    {
        $this->assertInstanceOf(\Frenet\Command\TrackingInterface::class, $this->api->tracking());
    }
}
