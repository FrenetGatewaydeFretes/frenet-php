<?php

declare(strict_types = 1);

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
