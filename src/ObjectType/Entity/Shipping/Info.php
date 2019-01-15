<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping;

use Frenet\ObjectType\EntityAbstract;

/**
 * Class Info
 * @package Frenet\ObjectType\Entity\Shipping
 */
class Info extends EntityAbstract implements InfoInterface
{
    /**
     * @var Info\ServiceFactory
     */
    private $serviceFactory;

    public function __construct(
        \Frenet\Framework\Data\SerializerInterface $serializer,
        Info\ServiceFactory $serviceFactory,
        array $data = []
    ) {
        parent::__construct($serializer, $data);
        $this->serviceFactory = $serviceFactory;
    }

    /**
     * @var array
     */
    protected $fieldMapping = [
        'ShippingSeviceAvailableArray' => 'available_shipping_services'
    ];

    /**
     * @return array
     */
    public function getAvailableShippingServices()
    {
        return $this->prepareAvailableShippingServices();
    }

    /**
     * @return array
     */
    private function prepareAvailableShippingServices()
    {
        $services = (array) $this->getData(self::FIELD_AVAILABLE_SHIPPING_SERVICES);
        $result = [];

        foreach ($services as $service) {
            $result[] = $this->serviceFactory->create(['data' => (array) $service]);
        }

        return $result;
    }
}
