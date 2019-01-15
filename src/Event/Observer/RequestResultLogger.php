<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

use TiagoSampaio\EventObserver\EventInterface;
use TiagoSampaio\EventObserver\Observer\ObserverAbstract;

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
     * @var \Frenet\ConfigPool
     */
    private $configPool;

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
     * @param \Frenet\ConfigPool                         $configPool
     * @param \Frenet\Logger\LoggerFactory               $loggerFactory
     * @param \Frenet\Framework\Data\SerializerInterface $serializer
     */
    public function __construct(
        \Frenet\ConfigPool $configPool,
        \Frenet\Logger\LoggerFactory $loggerFactory,
        \Frenet\Framework\Data\SerializerInterface $serializer
    ) {
        $this->configPool = $configPool;
        $this->loggerFactory = $loggerFactory;
        $this->serializer = $serializer;
    }

    /**
     * @param EventInterface $event
     *
     * @return bool
     */
    protected function canExecute(EventInterface $event)
    {
        if (!$this->configPool->debugger()->isEnabled()) {
            return false;
        }

        return parent::canExecute($event);
    }

    /**
     * @param EventInterface $event
     */
    protected function process(EventInterface $event)
    {
        try {
            /** @var \Psr\Log\LoggerInterface $logger */
            $logger = $this->loggerFactory->getLogger(
                'frenet_log',
                $this->configPool->debugger()->getFullFilename()
            );

            $options = (array) $event->getData('options');
            unset($options['headers']['token']);

            /** @var \Frenet\Framework\Http\Response\ResponseInterface $response */
            $response = $event->getData('response');
            $body = $response ? $response->getBody() : null;

            $info = [
                'request' => $options,
                'result'  => $body,
            ];

            $logger->debug($this->serializer->serialize($info));
        } catch (\Exception $e) {
        }
    }
}
