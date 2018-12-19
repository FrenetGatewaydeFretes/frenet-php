<?php

declare(strict_types = 1);

namespace FrenetTest\Event;

use FrenetTest\TestCase;

/**
 * Class EventTest
 *
 * @package FrenetTest\Event
 */
class EventTest extends TestCase
{
    /**
     * @var \Frenet\Event\Event
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Event\Event::class);
    }
    
    /**
     * @test
     */
    public function eventSetterAndGetter()
    {
        $data = [
            'key_one' => 1,
            'key_two' => 2,
        ];
        
        $this->assertInstanceOf(\Frenet\Event\Event::class, $this->object->setEvent('event_test', $data));
        
        $this->assertEquals('event_test', $this->object->getEventName());
        $this->assertEquals($data, $this->object->getData());
    }
}
