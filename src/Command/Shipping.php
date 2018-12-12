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
     * @var Shipping\InfoFactory
     */
    private $infoFactory;
    
    /**
     * Shipping constructor.
     * @param Shipping\InfoFactory $infoFactory
     */
    public function __construct(
        Shipping\InfoFactory $infoFactory
    ) {
        $this->infoFactory = $infoFactory;
    }
    
    /**
     * {@inheritdoc}
     */
    public function info()
    {
        /** @var Shipping\InfoInterface|CommandInterface $info */
        $info = $this->infoFactory->create();
        return $info->execute();
    }
    
    /**
     * {@inheritdoc}
     */
    public function quote($fromPostcode, $toPostcode, $shipmentInvoiceValue, array $items, $country)
    {
        // TODO: Implement quote() method.
    }
}
