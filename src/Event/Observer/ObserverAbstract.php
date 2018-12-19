<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

use Frenet\Event\EventInterface;

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
     * @var \Frenet\ConfigPool
     */
    protected $configPool;
    
    public function __construct(
        \Frenet\ConfigPool $configPool
    ) {
        $this->configPool = $configPool;
    }
    
    /**
     * @param EventInterface $event
     */
    final public function execute(EventInterface $event)
    {
        if (!$this->canExecute($event)) {
            return;
        }
        
        $this->process($event);
    }
    
    /**
     * @param EventInterface $event
     */
    abstract protected function process(EventInterface $event);
    
    /**
     * @param EventInterface $event
     *
     * @return bool
     */
    protected function canExecute(EventInterface $event)
    {
        if (!$this->configPool->debugger()->isEnabled()) {
            return false;
        }
        
        if (!$this->bind($event->getEventName())) {
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
