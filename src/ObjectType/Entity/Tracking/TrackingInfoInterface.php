<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Tracking;

/**
 * Class TrackingInfoInterface
 * @package Frenet\ObjectType\Entity\Tracking
 */
interface TrackingInfoInterface
{
    /**
     * @var string
     */
    const FIELD_TRACKING_NUMBER = 'tracking_number';

    /**
     * @var string
     */
    const FIELD_SERVICE_DESCRIPTION = 'service_description';

    /**
     * @var string
     */
    const FIELD_TRACKING_EVENTS = 'tracking_events';

    /**
     * @return mixed
     */
    public function getTrackingNumber();

    /**
     * @return mixed
     */
    public function getServiceDescription();

    /**
     * @return TrackingInfo\EventInterface[]
     */
    public function getTrackingEvents();
}
