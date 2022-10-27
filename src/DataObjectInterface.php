<?php

declare(strict_types = 1);

namespace Frenet;

/**
 * Interface DataObjectInterface
 * @package Frenet
 */
interface DataObjectInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function getData($key = null);
    
    /**
     * @param string $key
     * @return boolean
     */
    public function hasData($key);
    
    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setData($key, $value = null);
    
    /**
     * @param null|string $key
     * @return $this
     */
    public function unsetData($key = null);
    
    /**
     * @param array $data
     * @return $this
     */
    public function addData(array $data = []);
    
    /**
     * @return $this
     */
    public function resetData();
    
    /**
     * @return array
     */
    public function debug();
    
    /**
     * @param array $fields
     *
     * @return array
     */
    public function export(array $fields = []);
    
    /**
     * @return boolean
     */
    public function isEmpty();
}
