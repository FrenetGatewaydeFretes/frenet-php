<?php

declare(strict_types = 1);

use function \DI\autowire;
use Frenet\ObjectType\Entity;
use Frenet\Framework;
use Frenet\Service;
use Frenet\Command;
use TiagoSampaio\EventObserver;

return [
    /** Api Object */
    \Frenet\ApiInterface::class => autowire(\Frenet\Api::class),

    /** Entity Objects */
    Entity\Postcode\AddressInterface::class => autowire(Entity\Postcode\Address::class),
    Entity\Shipping\InfoInterface::class => autowire(Entity\Shipping\Info::class),
    Entity\Shipping\Info\ServiceInterface::class => autowire(Entity\Shipping\Info\Service::class),
    Entity\Shipping\QuoteInterface::class => autowire(Entity\Shipping\Quote::class),
    Entity\Shipping\Quote\ServiceInterface::class => autowire(Entity\Shipping\Quote\Service::class),
    Entity\Tracking\TrackingInfoInterface::class => autowire(Entity\Tracking\TrackingInfo::class),
    Entity\Tracking\TrackingInfo\EventInterface::class => autowire(Entity\Tracking\TrackingInfo\Event::class),

    /** Commands */
    Command\TrackingInterface::class => autowire(Command\Tracking::class),
    Command\ShippingInterface::class => autowire(Command\Shipping::class),
    Command\PostcodeInterface::class => autowire(Command\Postcode::class),

    /** Command Methods */
    Command\Postcode\AddressInterface::class => autowire(Command\Postcode\Address::class),
    Command\Shipping\InfoInterface::class => autowire(Command\Shipping\Info::class),
    Command\Shipping\QuoteInterface::class => autowire(Command\Shipping\Quote::class),
    Command\Tracking\TrackingInfoInterface::class => autowire(Command\Tracking\TrackingInfo::class),

    /** Service Objects */
    Service\ConnectionInterface::class => autowire(Service\Connection::class),
    Service\ResultInterface::class => autowire(Service\Result::class),
    Framework\Http\Response\ResponseSuccessInterface::class => autowire(Service\Response\Success::class),
    Framework\Http\Response\ResponseExceptionInterface::class => autowire(Service\Response\Exception::class),

    /** Framework Objects */
    Framework\Data\SerializerInterface::class => autowire(Framework\Data\Serializer::class),
    Framework\Data\DataObjectInterface::class => autowire(Framework\Data\DataObject::class),

    /** Other Objects */
    \GuzzleHttp\ClientInterface::class => autowire(\GuzzleHttp\Client::class),
    \Psr\Log\LoggerInterface::class => autowire(\Monolog\Logger::class),
    EventObserver\EventDispatcherInterface::class => autowire(EventObserver\EventDispatcher::class),
];
