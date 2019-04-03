<?php

declare(strict_types = 1);

namespace FrenetTest\Config;

use Frenet\Framework\Exception\WrongDataTypeException;
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

    /**
     * @test
     * @throws WrongDataTypeException
     */
    public function customProtocol()
    {
        $expectedProtocol = 'https';

        $this->object->setProtocol('https');
        $this->assertEquals($expectedProtocol, $this->object->getProtocol());

        $this->object->setProtocol('HTTPS');
        $this->assertEquals($expectedProtocol, $this->object->getProtocol());

        $this->object->setProtocol('HtTpS');
        $this->assertEquals($expectedProtocol, $this->object->getProtocol());
    }

    /**
     * @test
     * @throws WrongDataTypeException
     */
    public function customWrongProtocol()
    {
        $this->expectException(WrongDataTypeException::class);
        $this->expectExceptionMessage('Invalid protocol provided.');
        $this->object->setProtocol('httpz');
    }

    /**
     * @test
     * @throws WrongDataTypeException
     */
    public function customHostname()
    {
        $expectedHostname = 'custom.frenet.com.br';

        $this->object->setHostname('custom.frenet.com.br');
        $this->assertEquals($expectedHostname, $this->object->getHostname());
    }

    /**
     * @test
     * @throws WrongDataTypeException
     */
    public function customWrongHostname()
    {
        $this->expectException(WrongDataTypeException::class);
        $this->expectExceptionMessage('Invalid hostname format provided.');
        $this->object->setHostname('');
    }
}
