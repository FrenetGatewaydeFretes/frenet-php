<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Tracking\TrackingInfo;

/**
 * Class EventInterface
 * @package Frenet\ObjectType\Entity\Tracking\Events
 */
interface EventInterface
{
    /**
     * @var string
     */
    const FIELD_EVENT_DATETIME = 'event_datetime';

    /**
     * @var string
     */
    const FIELD_EVENT_LOCATION = 'event_location';

    /**
     * @var string
     */
    const FIELD_EVENT_DESCRIPTION = 'event_description';

    /**
     * @var string
     */
    const FIELD_EVENT_TYPE = 'event_type';

    /**
     * @var string
     */
    const FIELD_TRACKING_INFO = 'tracking_info';

    /**
     * @return string
     */
    public function getEventDatetime();

    /**
     * @return string
     */
    public function getEventLocation();

    /**
     * @return string
     */
    public function getEventDescription();

    /**
     * @return string
     */
    public function getEventType();

    /**
     * @return \Frenet\ObjectType\Entity\Tracking\TrackingInfoInterface
     */
    public function getTrackingInfo();
}
