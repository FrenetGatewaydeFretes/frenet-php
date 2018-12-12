<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class Shipping
 * @package Frenet\Command
 */
class Shipping implements ShippingInterface
{
    /**
     * @var \Frenet\ObjectType\Entity\Shipping\InfoFactory
     */
    private $infoFactory;
    
    /**
     * Shipping constructor.
     * @param \Frenet\ObjectType\Entity\Shipping\InfoFactory $infoFactory
     */
    public function __construct(
        \Frenet\ObjectType\Entity\Shipping\InfoFactory $infoFactory
    ) {
        $this->infoFactory = $infoFactory;
    }
    
    /**
     * @return mixed
     */
    public function info()
    {
        /** @var Shipping\InfoInterface|CommandInterface $info */
        $info = $this->infoFactory->create();
        return $info->execute();
    }
    
    /**
     * @return mixed
     */
    public function quote($fromPostcode, $toPostcode, $shipimentInvoiceValue, array $items, $country)
    {
        // TODO: Implement quote() method.
    }
}
