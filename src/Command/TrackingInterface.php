<?php

namespace Frenet\Command;

/**
 * Class TrackingInterface
 * @package Frenet\Command
 */
interface TrackingInterface
{
    /**
     * @return Tracking\TrackingInfoInterface
     */
    public function trackingInfo();
}
