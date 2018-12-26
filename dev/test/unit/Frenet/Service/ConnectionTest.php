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
    
    protected function setUp()
    {
        $this->clientResponse = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $this->client = $this->createMock(\GuzzleHttp\ClientInterface::class);
        
        $this->clientFactory = $this->createMock(\Frenet\Service\ClientFactory::class);
        $this->clientFactory->method('create')->willReturn($this->client);
        
        $this->object = $this->createObject(\Frenet\Service\ConnectionInterface::class, [
            'clientFactory' => $this->clientFactory
        ]);
    }
    
    protected function tearDown()
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
        $exception = new \GuzzleHttp\Exception\ClientException('Test', $clientRequest);
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
        $exception = new \GuzzleHttp\Exception\ClientException('Test', $clientRequest);
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
        $exception = new \GuzzleHttp\Exception\ClientException('Test', $clientRequest);
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
    
    private function configJson()
    {
        $this->config['type'] = 'json';
        return $this;
    }
}
