<?php

declare(strict_types = 1);

namespace FrenetTest\Service;

use FrenetTest\TestCase;
use Frenet\Service\ConnectionInterface;

/**
 * Class ConnectionTest
 *
 * @package FrenetTest
 */
class ConnectionTest extends TestCase
{
    /**
     * @var ConnectionInterface
     */
    private $object;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject $client
     */
    private $client;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject $client
     */
    private $clientResponse;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject $clientFactory
     */
    private $clientFactory;
    
    /**
     * @var array
     */
    private $data = [];
    
    /**
     * @var array
     */
    private $config = [];
    
    protected function setUp(): void
    {
        $this->clientResponse = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $this->client = $this->createMock(\GuzzleHttp\ClientInterface::class);
        
        $this->clientFactory = $this->createMock(\Frenet\Service\ClientFactory::class);
        $this->clientFactory->method('create')->willReturn($this->client);
        
        $this->object = $this->createObject(\Frenet\Service\ConnectionInterface::class, [
            'clientFactory' => $this->clientFactory
        ]);
    }
    
    protected function tearDown(): void
    {
        $this->clientResponse = null;
        $this->client = null;
        $this->clientFactory = null;
        $this->object = null;
        $this->data = [];
        $this->config = [];
    }
    
    /**
     * @test
     */
    public function requestOk()
    {
        $this->client->expects($this->once())->method('request')->willReturn($this->clientResponse);
    
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Success::class,
            $this->object->request(ConnectionInterface::METHOD_POST, '/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function requestGuzzleException()
    {
        $clientRequest = $this->createMock(\Psr\Http\Message\RequestInterface::class);
        $clientResponse = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $exception = new \GuzzleHttp\Exception\ClientException('Test', $clientRequest, $clientResponse);
        $this->client->expects($this->once())->method('request')->willThrowException($exception);
    
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Exception::class,
            $this->object->request(ConnectionInterface::METHOD_POST, '/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function requestNormalException()
    {
        $exception = new \Exception('Test');
        $this->client->expects($this->once())->method('request')->willThrowException($exception);
    
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Exception::class,
            $this->object->request(ConnectionInterface::METHOD_POST, '/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function postOk()
    {
        $this->client->expects($this->once())->method('request')->willReturn($this->clientResponse);
    
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Success::class,
            $this->object->post('/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function postGuzzleException()
    {
        $clientRequest = $this->createMock(\Psr\Http\Message\RequestInterface::class);
        $clientResponse = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $exception = new \GuzzleHttp\Exception\ClientException('Test', $clientRequest, $clientResponse);
        $this->client->expects($this->once())->method('request')->willThrowException($exception);
    
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Exception::class,
            $this->object->post('/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function postNormalException()
    {
        $exception = new \Exception('Test');
        $this->client->expects($this->once())->method('request')->willThrowException($exception);
        
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Exception::class,
            $this->object->post('/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function getOk()
    {
        $this->client->expects($this->once())->method('request')->willReturn($this->clientResponse);
    
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Success::class,
            $this->object->get('/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function getGuzzleException()
    {
        $clientRequest = $this->createMock(\Psr\Http\Message\RequestInterface::class);
        $clientResponse = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $exception = new \GuzzleHttp\Exception\ClientException('Test', $clientRequest, $clientResponse);
        $this->client->expects($this->once())->method('request')->willThrowException($exception);
    
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Exception::class,
            $this->object->get('/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function getNormalException()
    {
        $exception = new \Exception('Test');
        $this->client->expects($this->once())->method('request')->willThrowException($exception);
        
        $this->configJson();
        
        $this->assertInstanceOf(
            \Frenet\Service\Response\Exception::class,
            $this->object->get('/test/test', $this->data, $this->config)
        );
    }
    
    /**
     * @test
     */
    public function requestSendsTheDefaultTimeouts()
    {
        $this->client->expects($this->once())
            ->method('request')
            ->with(
                ConnectionInterface::METHOD_POST,
                $this->anything(),
                $this->callback(function (array $options) {
                    return $options['timeout'] === 30.0 && $options['connect_timeout'] === 10.0;
                })
            )
            ->willReturn($this->clientResponse);

        $this->configJson();
        $this->object->request(ConnectionInterface::METHOD_POST, '/test/test', $this->data, $this->config);
    }

    /**
     * @test
     * @throws \Frenet\Framework\Exception\WrongDataTypeException
     */
    public function requestSendsTheConfiguredTimeouts()
    {
        /** @var \Frenet\Config\Service $service */
        $service = $this->createObject(\Frenet\Config\Service::class);
        $service->setTimeout(8)->setConnectTimeout(2);

        $object = $this->createObject(ConnectionInterface::class, [
            'clientFactory' => $this->clientFactory,
            'configPool' => $this->createObject(\Frenet\ConfigPool::class, ['service' => $service]),
        ]);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                ConnectionInterface::METHOD_GET,
                $this->anything(),
                $this->callback(function (array $options) {
                    return $options['timeout'] === 8.0 && $options['connect_timeout'] === 2.0;
                })
            )
            ->willReturn($this->clientResponse);

        $this->configJson();
        $object->get('/test/test', $this->data, $this->config);
    }

    private function configJson()
    {
        $this->config['type'] = 'json';
        return $this;
    }
}
