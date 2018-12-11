<?php

declare(strict_types = 1);

namespace Frenet;

/**
 * Class Api
 * @package Frenet
 */
class Api implements ApiInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var \Frenet\Service\ConnectionInterface
     */
    private $connection;
    
    /**
     * @var Command\PostcodeInterface
     */
    private $postcode;
    
    /**
     * @var Command\ShippingInterface
     */
    private $shipping;
    
    /**
     * @var Command\TrackingInterface
     */
    private $tracking;
    
    /**
     * Api constructor.
     *
     * @param Service\ConnectionInterface $connection
     * @param Command\PostcodeInterface   $postcode
     * @param Command\ShippingInterface   $shipping
     * @param Command\TrackingInterface   $tracking
     * @param string                      $token
     */
    public function __construct(
        Service\ConnectionInterface $connection,
        Command\PostcodeInterface $postcode,
        Command\ShippingInterface $shipping,
        Command\TrackingInterface $tracking,
        string $token
    ) {
        $this->token = $token;
        $this->connection = $connection;
        
        $this->postcode = $postcode;
        $this->shipping = $shipping;
        $this->tracking = $tracking;

        /** Set the token. */
        $this->connection->setToken($this->getToken());
    }
    
    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
    
    /**
     * @return Command\ShippingInterface
     */
    public function shipping()
    {
        return $this->shipping;
    }
    
    /**
     * @return Command\TrackingInterface
     */
    public function tracking()
    {
        return $this->tracking;
    }
    
    /**
     * @return Command\PostcodeInterface
     */
    public function postcode()
    {
        return $this->postcode;
    }
}
