<?php

declare(strict_types = 1);

namespace Frenet\Event;

use Frenet\Framework\Data\DataObject;

/**
 * Class EventData
 *
 * @package Frenet\Event
 */
class Event extends DataObject implements EventInterface
{
    /**
     * @var string
     */
    private $name = null;
    
    /**
     * {@inheritdoc}
     */
    public function getEventName()
    {
        return $this->name;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setEvent($name, array $eventData = [])
    {
        $this->name = $name;
        $this->setData($eventData);
        return $this;
    }
}
