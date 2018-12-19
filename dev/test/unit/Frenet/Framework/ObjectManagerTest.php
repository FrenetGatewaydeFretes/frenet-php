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
         * @var \TiagoSampaio\DataObject $dataObject1
         * @var \TiagoSampaio\DataObject $dataObject2
         */
        $dataObject1 = \Frenet\Framework\ObjectManager::create(\TiagoSampaio\DataObject::class);
        $dataObject2 = \Frenet\Framework\ObjectManager::create(\TiagoSampaio\DataObject::class);
        
        $this->assertInstanceOf(\TiagoSampaio\DataObject::class, $dataObject1);
        $this->assertInstanceOf(\TiagoSampaio\DataObject::class, $dataObject2);
        
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
         * @var \TiagoSampaio\DataObject $dataObject1
         * @var \TiagoSampaio\DataObject $dataObject2
         */
        $dataObject1 = \Frenet\Framework\ObjectManager::get(\TiagoSampaio\DataObject::class);
        $dataObject2 = \Frenet\Framework\ObjectManager::get(\TiagoSampaio\DataObject::class);
    
        $this->assertInstanceOf(\TiagoSampaio\DataObject::class, $dataObject1);
        $this->assertInstanceOf(\TiagoSampaio\DataObject::class, $dataObject2);
    
        $dataObject1->setId(123);
        $dataObject2->setId(321);
    
        $this->assertEquals($dataObject1->getId(), $dataObject2->getId());
    }
}
