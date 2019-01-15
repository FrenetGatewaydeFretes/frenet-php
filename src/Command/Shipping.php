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
     * @var Shipping\Quote
     */
    private $quoteFactory;

    /**
     * Shipping constructor.
     * @param Shipping\InfoFactory  $infoFactory
     * @param Shipping\QuoteFactory $quoteFactory
     */
    public function __construct(
        Shipping\InfoFactory $infoFactory,
        Shipping\QuoteFactory $quoteFactory
    ) {
        $this->infoFactory = $infoFactory;
        $this->quoteFactory = $quoteFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function info()
    {
        /** @var Shipping\InfoInterface|CommandInterface $info */
        $info = $this->infoFactory->create();
        return $info;
    }

    /**
     * {@inheritdoc}
     */
    public function quote()
    {
        /** @var Shipping\QuoteInterface|CommandInterface $quote */
        $quote = $this->quoteFactory->create();
        return $quote;
    }
}
