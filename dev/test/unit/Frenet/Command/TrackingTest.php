<?php

declare(strict_types = 1);

namespace FrenetTest\Command;

use FrenetTest\TestCase;

/**
 * Class TrackingTest
 * @package FrenetTest\Command
 */
class TrackingTest extends TestCase
{
    /**
     * @var \Frenet\Command\TrackingInterface
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Command\TrackingInterface::class);
    }
    
    /**
     * @test
     */
    public function trackingInfo()
    {
        $this->assertInstanceOf(\Frenet\Command\Tracking\TrackingInfoInterface::class, $this->object->trackingInfo());
    }
}
