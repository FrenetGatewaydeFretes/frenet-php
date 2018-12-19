<?php

declare(strict_types = 1);

namespace FrenetTest;

/**
 * Class ConfigPoolTest
 *
 * @package FrenetTest
 */
class ConfigPoolTest extends TestCase
{
    /**
     * @var \Frenet\ConfigPool
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\ConfigPool::class);
    }
    
    /**
     * @test
     */
    public function credentials()
    {
        $this->assertInstanceOf(\Frenet\Config\Credentials::class, $this->object->credentials());
    }
    
    /**
     * @test
     */
    public function service()
    {
        $this->assertInstanceOf(\Frenet\Config\Service::class, $this->object->service());
    }
    
    /**
     * @test
     */
    public function debugger()
    {
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->debugger());
    }
}
