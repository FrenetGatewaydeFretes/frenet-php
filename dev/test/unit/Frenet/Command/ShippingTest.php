<?php

declare(strict_types = 1);

namespace FrenetTest\Command;

use FrenetTest\TestCase;

/**
 * Class ShippingTest
 * @package FrenetTest\Command
 */
class ShippingTest extends TestCase
{
    /**
     * @var \Frenet\Command\ShippingInterface
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Command\ShippingInterface::class);
    }
    
    /**
     * @test
     */
    public function info()
    {
        $this->assertInstanceOf(\Frenet\Command\Shipping\InfoInterface::class, $this->object->info());
    }
    
    /**
     * @test
     */
    public function quote()
    {
        $this->assertInstanceOf(\Frenet\Command\Shipping\QuoteInterface::class, $this->object->quote());
    }
}
