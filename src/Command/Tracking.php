<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class Tracking
 * @package Frenet\Command
 */
class Tracking implements TrackingInterface
{
    /**
     * @var Tracking\TrackingInfoFactory
     */
    private $trackingInfoFactory;

    public function __construct(
        Tracking\TrackingInfoFactory $trackingInfoFactory
    ) {
        $this->trackingInfoFactory = $trackingInfoFactory;
    }

    /**
     * @inheritdoc
     */
    public function trackingInfo()
    {
        /** @var Tracking\TrackingInfoInterface $trackingInfo */
        $trackingInfo = $this->trackingInfoFactory->create();
        return $trackingInfo;
    }
}
