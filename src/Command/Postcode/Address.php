<?php

declare(strict_types = 1);

namespace Frenet\Command\Postcode;

use Frenet\Command\CommandAbstract;

/**
 * Class Address
 * @package Frenet\Command\Postcode
 */
class Address extends CommandAbstract implements AddressInterface
{
    /**
     * @var string
     */
    protected $urlPath = '/CEP/Address';
    
    /**
     * @var string
     */
    protected $requestMethod = 'GET';
    
    /**
     * {@inheritdoc}
     */
    public function setPostcode($postcode)
    {
        $this->setData('postcode', $postcode);
        return $this;
    }
}
