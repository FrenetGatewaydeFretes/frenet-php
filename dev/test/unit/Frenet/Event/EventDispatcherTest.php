<?php

declare(strict_types = 1);

namespace FrenetTest\Event;

use FrenetTest\TestCase;

/**
 * Class EventDispatcherTest
 *
 * @package FrenetTest\Event
 */
class EventDispatcherTest extends TestCase
{
    /**
     * @var \Frenet\Event\EventDispatcher
     */
    private $object;
    
    /**
     * @var \Frenet\Event\Observer\ObserverFactory
     */
    private $observerFactory;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Event\EventDispatcher::class);
        $this->observerFactory = $this->createObject(\Frenet\Event\Observer\ObserverFactory::class);
    }
    
    /**
     * @test
     */
    public function addObserver()
    {
        $this->assertInstanceOf(
            \Frenet\Event\EventDispatcher::class,
            $this->object->addObserver($this->observerFactory->createRequestResultLogger())
        );
    }
    
    /**
     * @test
     */
    public function dispatch()
    {
        $observer = $this->createMock(\Frenet\Event\Observer\ObserverInterface::class);
        $observer->expects($this->once())->method('execute');
        
        $this->object->addObserver($observer);
        
        $this->assertNull(
            $this->object->dispatch('connection_request_result', ['data_one' => 'value_one'])
        );
    }
}
