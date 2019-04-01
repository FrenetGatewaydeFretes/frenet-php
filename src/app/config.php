<?php

//use function \DI\object;
//use function \DI\get;
use Frenet\ObjectType\Entity;
use Frenet\Framework;
use Frenet\Service;
use Frenet\Command;
use TiagoSampaio\EventObserver;

return [
    /** Api Object */
    \Frenet\ApiInterface::class => \DI\object(\Frenet\Api::class),

    /** Entity Objects */
    Entity\Postcode\AddressInterface::class => \DI\object(Entity\Postcode\Address::class),
    Entity\Shipping\InfoInterface::class => \DI\object(Entity\Shipping\Info::class),
    Entity\Shipping\Info\ServiceInterface::class => \DI\object(Entity\Shipping\Info\Service::class),
    Entity\Shipping\QuoteInterface::class => \DI\object(Entity\Shipping\Quote::class),
    Entity\Shipping\Quote\ServiceInterface::class => \DI\object(Entity\Shipping\Quote\Service::class),
    Entity\Tracking\TrackingInfoInterface::class => \DI\object(Entity\Tracking\TrackingInfo::class),
    Entity\Tracking\TrackingInfo\EventInterface::class => \DI\object(Entity\Tracking\TrackingInfo\Event::class),

    /** Commands */
    Command\TrackingInterface::class => \DI\object(Command\Tracking::class),
    Command\ShippingInterface::class => \DI\object(Command\Shipping::class),
    Command\PostcodeInterface::class => \DI\object(Command\Postcode::class),

    /** Command Methods */
    Command\Postcode\AddressInterface::class => \DI\object(Command\Postcode\Address::class),
    Command\Shipping\InfoInterface::class => \DI\object(Command\Shipping\Info::class),
    Command\Shipping\QuoteInterface::class => \DI\object(Command\Shipping\Quote::class),
    Command\Tracking\TrackingInfoInterface::class => \DI\object(Command\Tracking\TrackingInfo::class),

    /** Service Objects */
    Service\ConnectionInterface::class => \DI\object(Service\Connection::class),
    Service\ResultInterface::class => \DI\object(Service\Result::class),
    Framework\Http\Response\ResponseSuccessInterface::class => \DI\object(Service\Response\Success::class),
    Framework\Http\Response\ResponseExceptionInterface::class => \DI\object(Service\Response\Exception::class),

    /** Framework Objects */
    Framework\Data\SerializerInterface::class => \DI\object(Framework\Data\Serializer::class),
    Framework\Data\DataObjectInterface::class => \DI\object(Framework\Data\DataObject::class),

    /** Other Objects */
    \GuzzleHttp\ClientInterface::class => \DI\object(\GuzzleHttp\Client::class),
    \Psr\Log\LoggerInterface::class => \DI\object(\Monolog\Logger::class),
    EventObserver\EventDispatcherInterface::class => \DI\object(EventObserver\EventDispatcher::class),
];
