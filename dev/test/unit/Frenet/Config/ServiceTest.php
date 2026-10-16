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
    
    protected function setUp(): void
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

    /**
     * @test
     */
    public function defaultTimeouts()
    {
        $this->assertSame(30.0, $this->object->getTimeout());
        $this->assertSame(10.0, $this->object->getConnectTimeout());
    }

    /**
     * @test
     * @throws WrongDataTypeException
     */
    public function customTimeouts()
    {
        $this->object->setTimeout(15);
        $this->object->setConnectTimeout('2.5');

        $this->assertSame(15.0, $this->object->getTimeout());
        $this->assertSame(2.5, $this->object->getConnectTimeout());
    }

    /**
     * @test
     * @throws WrongDataTypeException
     */
    public function connectTimeoutNeverExceedsTimeout()
    {
        $this->object->setTimeout(4);

        $this->assertSame(4.0, $this->object->getConnectTimeout());
    }

    /**
     * @test
     * @dataProvider invalidTimeoutProvider
     *
     * @param mixed $seconds
     *
     * @throws WrongDataTypeException
     */
    public function customWrongTimeout($seconds)
    {
        $this->expectException(WrongDataTypeException::class);
        $this->expectExceptionMessage('Invalid timeout provided.');
        $this->object->setTimeout($seconds);
    }

    /**
     * @test
     * @dataProvider invalidTimeoutProvider
     *
     * @param mixed $seconds
     *
     * @throws WrongDataTypeException
     */
    public function customWrongConnectTimeout($seconds)
    {
        $this->expectException(WrongDataTypeException::class);
        $this->expectExceptionMessage('Invalid connect timeout provided.');
        $this->object->setConnectTimeout($seconds);
    }

    /**
     * @return array
     */
    public function invalidTimeoutProvider()
    {
        return [
            'zero' => [0],
            'negative' => [-5],
            'empty' => [''],
            'text' => ['ten'],
            'null' => [null],
        ];
    }
}
