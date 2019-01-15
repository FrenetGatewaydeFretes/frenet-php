<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class Postcode
 * @package Frenet\Command
 */
class Postcode implements PostcodeInterface
{
    /**
     * @var Postcode\AddressFactory
     */
    private $addressFactory;

    /**
     * Postcode constructor.
     * @param Postcode\AddressFactory $addressFactory
     */
    public function __construct(
        Postcode\AddressFactory $addressFactory
    ) {
        $this->addressFactory = $addressFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function address($postcode)
    {
        /** @var Postcode\AddressInterface $address */
        $address = $this->addressFactory->create();
        $address->setPostcode($postcode);
        return $address;
    }
}
