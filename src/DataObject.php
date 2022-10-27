<?php

declare(strict_types = 1);

namespace Frenet;


/**
 * Class DataObject
 * @package Telegram\Framework\Data
 */
class DataObject implements DataObjectInterface, \ArrayAccess
{
    /**
     * @var array
     */
    protected $data = [];
    
    /**
     * DataObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }
    
    /**
     * @param string $method
     * @param array  $args
     *
     * @return array|bool|mixed|DataObject|DataObjectInterface|null
     * @throws DataObjectException
     */
    public function __call($method, $args)
    {
        $key = $this->underscore(substr($method, 3));
        
        switch (substr($method, 0, 3)) {
            case 'get':
                $index = isset($args[0]) ? $args[0] : null;
                return $this->getData($key);
            case 'set':
                $value = isset($args[0]) ? $args[0] : null;
                return $this->setData($key, $value);
            case 'uns':
                return $this->unsetData($key);
            case 'has':
                return $this->hasData($key);
        }
        
        $class = get_class($this);
        throw new DataObjectException("The method {$method} does not exist in the class {$class}.");
    }
    
    /**
     * {@inheritdoc}
     */
    public function getData($key = null)
    {
        if (null === $key) {
            return $this->data;
        }
        
        if (is_array($key)) {
            return $this->data;
        }
        
        if (!isset($this->data[$key])) {
            return null;
        }
        
        return $this->data[$key];
    }
    
    /**
     * {@inheritdoc}
     */
    public function setData($key, $value = null)
    {
        if (is_array($key)) {
            $this->data = (array) $key;
        }
        
        if (!is_array($key)) {
            $this->data[$key] = $value;
        }
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function unsetData($key = null)
    {
        if (null === $key) {
            $this->setData([]);
        }
        
        if (is_string($key)) {
            if (isset($this->data[$key]) || array_key_exists($key, $this->data)) {
                unset($this->data[$key]);
            }
        }
        
        if (is_array($key)) {
            foreach ($key as $element) {
                $this->unsetData($element);
            }
        }
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function addData(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (empty($key) || empty($value)) {
                continue;
            }
            
            $this->data[$key] = $value;
        }
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function hasData($key)
    {
        return (bool) isset($this->data[$key]);
    }
    
    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->data);
    }
    
    /**
     * {@inheritdoc}
     */
    public function resetData()
    {
        $this->data = [];
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function debug()
    {
        return (array) $this->data;
    }
    
    /**
     * {@inheritdoc}
     */
    public function export(array $keys = [])
    {
        if (empty($keys)) {
            return (array) $this->data;
        }
        
        $result = [];
        
        /** @var string $key */
        foreach ($keys as $key) {
            $result[$key] = $this->getData($key);
        }
        
        return (array) $result;
    }
    
    /**
     * Implementation of ArrayAccess::offsetSet()
     *
     * @link http://www.php.net/manual/en/arrayaccess.offsetset.php
     * @param string $offset
     * @param mixed $value
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        return $this->setData($offset, $value);
    }
    
    /**
     * Implementation of ArrayAccess::offsetExists()
     *
     * @link http://www.php.net/manual/en/arrayaccess.offsetexists.php
     * @param string $offset
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return $this->hasData($offset);
    }
    
    /**
     * Implementation of ArrayAccess::offsetUnset()
     *
     * @link http://www.php.net/manual/en/arrayaccess.offsetunset.php
     * @param string $offset
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        return $this->unsetData($offset);
    }
    
    /**
     * Implementation of ArrayAccess::offsetGet()
     *
     * @link http://www.php.net/manual/en/arrayaccess.offsetget.php
     * @param string $offset
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->getData($offset);
    }
    
    /**
     * @param string $name
     *
     * @return string|null
     */
    private function underscore($name)
    {
        $result = preg_replace('/([A-Z]|[0-9]+)/', "_$1", $name);
        $result = trim($result, '_');
        $result = strtolower($result);
        
        return $result;
    }
}
