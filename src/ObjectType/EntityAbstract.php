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
     * @var array
     */
    protected $fieldMapping = [];
    
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
        $this->applyMappings();
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
    
    /**
     * @return void
     */
    private function applyMappings()
    {
        $data    = $this->getData();
        $newData = [];
        
        foreach ($data as $key => $value) {
            $key = strtolower($key);
            
            if (!array_key_exists($key, $this->fieldMapping) || empty($this->fieldMapping[$key])) {
                continue;
            }
            
            $field = $this->fieldMapping[$key];
            $newData[$field] = $value;
        }
        
        $this->setData($newData);
    }
}
