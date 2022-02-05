<?php

declare(strict_types = 1);

namespace FrenetTest\Framework\Data;

use Frenet\Framework\Data\SerializerInterface;
use FrenetTest\TestCase;

/**
 * Class Serializer
 * @package FrenetTest\Framework\Data
 */
class SerializerTest extends TestCase
{
    /**
     * @test
     */
    public function serializeUnserialize()
    {
        /** @var SerializerInterface $serializer */
        $serializer = $this->createObject(SerializerInterface::class);
        
        $data = [
            'first_name' => 'John',
            'middle_name' => 'Robert',
            'last_name' => 'Doe',
        ];
        
        $this->assertEquals(json_encode($data), $serializer->serialize($data));
        $this->assertEquals($data, $serializer->unserialize(json_encode($data)));
    }
}
