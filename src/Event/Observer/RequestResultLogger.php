<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

use Frenet\Event\EventInterface;

/**
 * Class LogRequestResult
 *
 * @package Frenet\Event\Observer
 */
class RequestResultLogger extends ObserverAbstract
{
    /**
     * @var array
     */
    protected $bindEvents = [
        'connection_request_result'
    ];
    
    /**
     * @var \Frenet\Logger\LoggerFactory
     */
    private $loggerFactory;
    
    /**
     * @var \Frenet\Framework\Data\SerializerInterface
     */
    private $serializer;
    
    /**
     * RequestResultLogger constructor.
     *
     * @param \Frenet\ConfigPool           $configPool
     * @param \Frenet\Logger\LoggerFactory $loggerFactory
     */
    public function __construct(
        \Frenet\ConfigPool $configPool,
        \Frenet\Logger\LoggerFactory $loggerFactory,
        \Frenet\Framework\Data\SerializerInterface $serializer
    ) {
        parent::__construct($configPool);
        $this->loggerFactory = $loggerFactory;
        $this->serializer = $serializer;
    }
    
    /**
     * @param EventInterface $event
     */
    protected function process(EventInterface $event)
    {
        /** @var \Psr\Log\LoggerInterface $logger */
        $logger  = $this->loggerFactory->getLogger('frenet_log', $this->configPool->debugger()->getFullFilename());
    
        $options = (array) $event->getData('options');
        unset($options['headers']['token']);
        
        /** @var \Frenet\Framework\Http\Response\ResponseInterface $response */
        $response = $event->getData('response');
        $body     = $response ? $response->getBody() : null;
        
        $info = [
            'request' => $options,
            'result'  => $body,
        ];
        
        $logger->debug($this->serializer->serialize($info));
    }
}
