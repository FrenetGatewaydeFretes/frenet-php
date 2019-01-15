<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Tracking;

use Frenet\ObjectType\EntityAbstract;

/**
 * Class TrackingInfo
 * @package Frenet\ObjectType\Entity\Tracking
 */
class TrackingInfo extends EntityAbstract implements TrackingInfoInterface
{
    /**
     * @var TrackingInfo\EventFactory
     */
    private $eventFactory;

    /**
     * @var array
     */
    protected $fieldMapping = [
        'TrackingNumber'    => self::FIELD_TRACKING_NUMBER,
        'ServiceDescrition' => self::FIELD_SERVICE_DESCRIPTION,
        'TrackingEvents'    => self::FIELD_TRACKING_EVENTS,
    ];

    public function __construct(
        \Frenet\Framework\Data\SerializerInterface $serializer,
        TrackingInfo\EventFactory $eventFactory,
        array $data = []
    ) {
        parent::__construct($serializer, $data);
        $this->eventFactory = $eventFactory;
    }

    /**
     * @inheritdoc
     */
    public function getTrackingNumber()
    {
        return $this->getData(self::FIELD_TRACKING_NUMBER);
    }

    /**
     * @inheritdoc
     */
    public function getServiceDescription()
    {
        return $this->getData(self::FIELD_SERVICE_DESCRIPTION);
    }

    /**
     * @inheritdoc
     */
    public function getTrackingEvents()
    {
        return $this->prepareTrackingEvents();
    }

    /**
     * @return array
     */
    private function prepareTrackingEvents()
    {
        $events = (array) $this->getData(self::FIELD_TRACKING_EVENTS);
        $result = [];

        $events = array_reverse($events);

        /** @var array $events */
        foreach ($events as $event) {
            /** @var \Frenet\ObjectType\Entity\Tracking\TrackingInfo\Event $eventModel */
            $eventModel = $this->eventFactory->create(['data' => (array) $event]);
            $eventModel->setTrackingInfo($this);

            $result[] = $eventModel;
        }

        return $result;
    }
}
