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
    
    /**
     * @var \Frenet\Model\Normalizer\PostcodeNormalizer
     */
    private $postcodeNormalizer;
    
    public function __construct(
        \Frenet\Service\ConnectionInterface $connection,
        \Frenet\Framework\Data\SerializerInterface $serializer,
        \Frenet\ObjectType\Entity\Postcode\AddressFactory $typeFactory,
        \Frenet\Model\Normalizer\PostcodeNormalizer $postcodeNormalizer
    ) {
        parent::__construct($connection, $serializer, $typeFactory);
        $this->postcodeNormalizer = $postcodeNormalizer;
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
     * {@inheritdoc}
     */
    public function getPostcode()
    {
        return $this->getData('postcode');
    }
    
    /**
     * {@inheritdoc}
     */
    public function getUrlPath()
    {
        return parent::getUrlPath() . '/' . $this->postcodeNormalizer->normalize($this->getPostcode());
    }
}
