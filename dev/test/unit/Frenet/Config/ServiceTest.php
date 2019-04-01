<?php

namespace FrenetTest\Config;

use FrenetTest\TestCase;

/**
 * Class ServiceTest
 *
 * @package FrenetTest\Config
 */
class ServiceTest extends TestCase
{
    /**
     * @var \Frenet\Config\Service
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Config\Service::class);
    }
    
    /**
     * @test
     */
    public function tokenSetterAndGetter()
    {
        $this->assertEquals('http', $this->object->getProtocol());
        $this->assertEquals('api.frenet.com.br', $this->object->getHost());
    }
}
