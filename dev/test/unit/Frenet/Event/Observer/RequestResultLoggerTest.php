<?php

declare(strict_types = 1);

namespace FrenetTest\Event\Observer;

use FrenetTest\TestCase;

/**
 * Class RequestResultLoggerTest
 *
 * @package FrenetTest\Event\Observer
 */
class RequestResultLoggerTest extends TestCase
{
    /**
     * @var \Frenet\Event\Observer\RequestResultLogger
     */
    private $object;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $event;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $configPool;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $debugger;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $loggerFactory;
    
    protected function setUp()
    {
        $this->loggerFactory = $this->createMock(\Frenet\Logger\LoggerFactory::class);
        $this->debugger      = $this->createMock(\Frenet\Config\Debugger::class);
        $this->configPool    = $this->createMock(\Frenet\ConfigPool::class);
        $this->event         = $this->createMock(\TiagoSampaio\EventObserver\Event::class);
        $this->object        = $this->createObject(\Frenet\Event\Observer\RequestResultLogger::class, [
            'configPool' => $this->configPool,
            'loggerFactory' => $this->loggerFactory,
        ]);
    }
    
    /**
     * @test
     */
    public function executeNotEnabled()
    {
        $this->debugger->method('isEnabled')->willReturn(false);
        $this->configPool->method('debugger')->willReturn($this->debugger);
        
        $this->assertNull($this->object->execute($this->event));
    }
    
    /**
     * @test
     */
    public function executeEnabledWrongEventName()
    {
        $this->debugger->method('isEnabled')->willReturn(true);
        $this->configPool->method('debugger')->willReturn($this->debugger);
        $this->event->method('getEventName')->willReturn('test_event_name');
        
        $this->assertNull($this->object->execute($this->event));
    }
    
    /**
     * @test
     */
    public function executeEnabledRightEventName()
    {
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $logger->method('debug')->willReturn(null);
        
        $this->loggerFactory->method('getLogger')->willReturn($logger);
        $this->debugger->method('isEnabled')->willReturn(true);
        $this->configPool->method('debugger')->willReturn($this->debugger);
        $this->event->method('getEventName')->willReturn('connection_request_result');
        
        $this->assertNull($this->object->execute($this->event));
    }
}
