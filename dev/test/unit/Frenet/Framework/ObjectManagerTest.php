<?php

declare(strict_types = 1);

namespace FrenetTest\Framework;

use FrenetTest\TestCase;

/**
 * Class ObjectManagerTest
 *
 * @package FrenetTest\Framework
 */
class ObjectManagerTest extends TestCase
{
    /**
     * @test
     */
    public function create()
    {
        /**
         * @var \Frenet\DataObject $dataObject1
         * @var \Frenet\DataObject $dataObject2
         */
        $dataObject1 = \Frenet\Framework\ObjectManager::create(\Frenet\DataObject::class);
        $dataObject2 = \Frenet\Framework\ObjectManager::create(\Frenet\DataObject::class);
        
        $this->assertInstanceOf(\Frenet\DataObject::class, $dataObject1);
        $this->assertInstanceOf(\Frenet\DataObject::class, $dataObject2);
        
        $dataObject1->setId(123);
        $dataObject2->setId(321);
        
        $this->assertNotEquals($dataObject1->getId(), $dataObject2->getId());
    }
    
    /**
     * @test
     */
    public function get()
    {
        /**
         * @var \Frenet\DataObject $dataObject1
         * @var \Frenet\DataObject $dataObject2
         */
        $dataObject1 = \Frenet\Framework\ObjectManager::get(\Frenet\DataObject::class);
        $dataObject2 = \Frenet\Framework\ObjectManager::get(\Frenet\DataObject::class);
    
        $this->assertInstanceOf(\Frenet\DataObject::class, $dataObject1);
        $this->assertInstanceOf(\Frenet\DataObject::class, $dataObject2);
    
        $dataObject1->setId(123);
        $dataObject2->setId(321);
    
        $this->assertEquals($dataObject1->getId(), $dataObject2->getId());
    }
}
