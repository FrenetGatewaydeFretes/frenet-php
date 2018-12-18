<?php

declare(strict_types = 1);

namespace Frenet\Event;

use Frenet\Event\Observer\ObserverInterface;

/**
 * Class EventDispatcher
 *
 * @package Frenet\Event
 */
class EventDispatcher implements EventDispatcherInterface
{
    /**
     * @var array
     */
    private $observers = [];
    
    /**
     * @var EventDataFactory
     */
    private $eventDataFactory;
    
    public function __construct(
        EventDataFactory $eventDataFactory
    ) {
        $this->eventDataFactory = $eventDataFactory;
    }
    
    /**
     * {@inheritdoc}
     */
    public function dispatch($eventName, array $eventData = [])
    {
        /** @var Observer\ObserverInterface $observer */
        foreach ($this->observers as $observer) {
            /** @var EventDataInterface $data */
            $data = $this->eventDataFactory->create();
            $data->setEvent($eventName, (array) $eventData);
            
            $observer->execute($data);
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function addObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
        
        return $this;
    }
}
