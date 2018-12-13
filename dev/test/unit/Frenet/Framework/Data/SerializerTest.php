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
            'first_name' => $this->faker()->firstName,
            'middle_name' => $this->faker()->lastName,
            'last_name' => $this->faker()->lastName,
        ];
        
        $this->assertEquals(json_encode($data), $serializer->serialize($data));
        $this->assertEquals($data, $serializer->unserialize(json_encode($data)));
    }
}
