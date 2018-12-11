<?php

namespace Frenet\ObjectType;

use Frenet\Framework\Data\DataObject;

/**
 * Class EntityAbstract
 *
 * @package Frenet\ObjectType
 */
abstract class EntityAbstract extends DataObject implements EntityInterface
{
    /**
     * @var \Frenet\Framework\Data\SerializerInterface
     */
    protected $serializer;
    
    /**
     * EntityAbstract constructor.
     *
     * @param \Frenet\Framework\Data\SerializerInterface $serializer
     * @param array                                        $data
     */
    public function __construct(
        \Frenet\Framework\Data\SerializerInterface $serializer,
        array $data = []
    ) {
        $this->serializer = $serializer;
        parent::__construct($data);
    }
    
    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->serializer->serialize($this->data);
    }
    
    /**
     * @return bool
     */
    protected function canInitialize()
    {
        return (bool) !empty($this->data);
    }
}
