<?php

declare(strict_types = 1);

namespace FrenetTest\Framework\Object;

use FrenetTest\TestCase;

/**
 * Class GodFactoryTest
 *
 * @package FrenetTest\Framework\Object
 */
class GodFactoryTest extends TestCase
{
    /**
     * @var \Frenet\Framework\Object\GodFactory
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Framework\Object\GodFactory::class);
    }
    
    /**
     * @test
     */
    public function assertCreateObject()
    {
        $this->assertInstanceOf(
            \TiagoSampaio\DataObject::class,
            $this->object->createObject(\TiagoSampaio\DataObject::class)
        );
        
        $this->assertFalse($this->object->createObject(''));
    }
    
    /**
     * @test
     */
    public function makeThrowException()
    {
        $exception = new \Exception('Test Exception');
        
        $objectManager = $this->createMock(\Frenet\Framework\ObjectManager::class);
        $objectManager->method('create')->willThrowException($exception);
        
        $this->object = $this->createObject(\Frenet\Framework\Object\GodFactory::class, [
            'objectManager' => $objectManager
        ]);
        
        $this->assertFalse($this->object->createObject(\TiagoSampaio\DataObjectInterface::class));
    }
}
