<?php

declare(strict_types = 1);

namespace Frenet\Framework\Data;

/**
 * Class Serializer
 * @package Frenet\Framework\Data
 */
class Serializer implements SerializerInterface
{

    /**
     * {@inheritdoc}
     */
    public function serialize(array $data)
    {
        return json_encode($data);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize(string $data)
    {
        return (array) json_decode($data, true);
    }
}
