<?php

declare(strict_types = 1);

namespace Frenet\EventObserver\Observer;

use Frenet\EventObserver\EventInterface;

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
    protected $bindEvents = [];
    
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
