<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Tracking\TrackingInfo;

use Frenet\ObjectType\EntityAbstract;

/**
 * Class Event
 * @package Frenet\ObjectType\Entity\Tracking\Events
 */
class Event extends EntityAbstract implements EventInterface
{
    /**
     * @var array
     */
    protected $fieldMapping = [
        'EventDateTime'    => self::FIELD_EVENT_DATETIME,
        'EventLocation'    => self::FIELD_EVENT_LOCATION,
        'EventDescription' => self::FIELD_EVENT_DESCRIPTION,
        'EventType'        => self::FIELD_EVENT_TYPE,
    ];

    /**
     * @return string
     */
    public function getEventDatetime()
    {
        return $this->getData(self::FIELD_EVENT_DATETIME);
    }

    /**
     * @return string
     */
    public function getEventLocation()
    {
        return $this->getData(self::FIELD_EVENT_LOCATION);
    }

    /**
     * @return string
     */
    public function getEventDescription()
    {
        return $this->getData(self::FIELD_EVENT_DESCRIPTION);
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->getData(self::FIELD_EVENT_TYPE);
    }

    /**
     * @inheritdoc
     */
    public function getTrackingInfo()
    {
        return $this->getData(self::FIELD_TRACKING_INFO);
    }

    /**
     * @inheritdoc
     */
    public function setTrackingInfo(\Frenet\ObjectType\Entity\Tracking\TrackingInfoInterface $trackingInfo)
    {
        return $this->setData(self::FIELD_TRACKING_INFO, $trackingInfo);
    }
}
