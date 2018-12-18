<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

/**
 * Class ObserverAbstract
 *
 * @package Frenet\Event\Observer
 */
abstract class ObserverAbstract implements ObserverInterface
{
    /**
     * @var array
     */
    protected $bindEvents = [
        'connection_request_result'
    ];
    
    /**
     * @param string $eventName
     *
     * @return bool
     */
    protected function canExecute($eventName)
    {
        if (!$this->bind($eventName)) {
            return false;
        }
        
        return true;
    }
    
    /**
     * @param string $eventName
     *
     * @return bool
     */
    private function bind($eventName)
    {
        return (bool) in_array($eventName, $this->bindEvents);
    }
}
