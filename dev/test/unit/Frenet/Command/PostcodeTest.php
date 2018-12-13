<?php

declare(strict_types = 1);

namespace FrenetTest\Command;

use FrenetTest\TestCase;

/**
 * Class PostcodeTest
 * @package FrenetTest\Command
 */
class PostcodeTest extends TestCase
{
    /**
     * @var \Frenet\Command\PostcodeInterface
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Command\PostcodeInterface::class);
    }
    
    /**
     * @test
     */
    public function address()
    {
        /**
         * @var \Frenet\Command\Postcode\AddressInterface
         */
        $address = $this->object->address('06395-010');
        $this->assertInstanceOf(\Frenet\Command\Postcode\AddressInterface::class, $address);
        $this->assertEquals('06395-010', $address->getPostcode());
    }
}
