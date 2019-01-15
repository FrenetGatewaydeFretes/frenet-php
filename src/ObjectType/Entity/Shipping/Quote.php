<?php

declare(strict_types = 1);

namespace Frenet\ObjectType\Entity\Shipping;

use Frenet\ObjectType\EntityAbstract;

/**
 * Class Quote
 *
 * @package Frenet\ObjectType\Entity\Shipping
 */
class Quote extends EntityAbstract implements QuoteInterface
{
    /**
     * @var Quote\ServiceFactory
     */
    private $serviceFactory;

    /**
     * @var array
     */
    protected $fieldMapping = [
        'ShippingSevicesArray' => 'shipping_services',
    ];

    public function __construct(
        \Frenet\Framework\Data\SerializerInterface $serializer,
        Quote\ServiceFactory $serviceFactory,
        array $data = []
    ) {
        parent::__construct($serializer, $data);
        $this->serviceFactory = $serviceFactory;
    }

    /**
     * @return array
     */
    public function getShippingServices()
    {
        return $this->prepareShippingServices();
    }

    /**
     * @return array
     */
    private function prepareShippingServices()
    {
        $services = (array) $this->getData(self::FIELD_SHIPPING_SERVICES);
        $result = [];

        /** @var array $service */
        foreach ($services as $service) {
            $result[] = $this->serviceFactory->create(['data' => (array) $service]);
        }

        return $result;
    }
}
