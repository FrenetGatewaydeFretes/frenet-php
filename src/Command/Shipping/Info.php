<?php

declare(strict_types = 1);

namespace Frenet\Command\Shipping;

use Frenet\Command\CommandAbstract;

/**
 * Class Info
 * @package Frenet\Command\Shipping
 */
class Info extends CommandAbstract implements InfoInterface
{
    /**
     * {@inheritdoc}
     */
    protected $urlPath = 'shipping/info';

    /**
     * {@inheritdoc}
     */
    protected $requestMethod = self::REQUEST_METHOD_GET;

    public function __construct(
        \Frenet\Service\ConnectionInterface $connection,
        \Frenet\Framework\Data\SerializerInterface $serializer,
        \Frenet\ObjectType\Entity\Shipping\InfoFactory $typeFactory
    ) {
        parent::__construct($connection, $serializer, $typeFactory);
    }
}
