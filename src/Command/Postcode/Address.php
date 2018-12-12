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
     * {@inheritdoc}
     */
    protected $urlPath = 'CEP/Address';
    
    /**
     * {@inheritdoc}
     */
    protected $requestMethod = self::REQUEST_METHOD_GET;
    
    public function __construct(
        \Frenet\Service\ConnectionInterface $connection,
        \Frenet\Framework\Data\SerializerInterface $serializer,
        \Frenet\ObjectType\Entity\Postcode\AddressFactory $typeFactory
    ) {
        parent::__construct($connection, $serializer, $typeFactory);
    }
    
    /**
     * {@inheritdoc}
     */
    public function setPostcode($postcode)
    {
        $this->setData('postcode', $postcode);
        return $this;
    }
    
    /**
     * @return array|mixed|null
     */
    public function getPostcode()
    {
        return $this->getData('postcode');
    }
    
    /**
     * @return string
     */
    public function getUrlPath()
    {
        return parent::getUrlPath() . '/' . $this->preparePostcode($this->getPostcode());
    }
    
    /**
     * Normalize the postcode number for request.
     *
     * @param string $postcode
     *
     * @return string
     */
    private function preparePostcode($postcode)
    {
        if (empty($postcode)) {
            return null;
        }
        
        $postcode = preg_replace('/[^0-9]/', null, $postcode);
        $postcode = str_pad($postcode, 8, '0', STR_PAD_LEFT);
        return $postcode;
    }
}
