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
     * RequestResultLogger constructor.
     *
     * @param \Frenet\ConfigPool           $configPool
     * @param \Frenet\Logger\LoggerFactory $loggerFactory
     */
    public function __construct(
        \Frenet\ConfigPool $configPool,
        \Frenet\Logger\LoggerFactory $loggerFactory
    ) {
        parent::__construct($configPool);
        $this->loggerFactory = $loggerFactory;
    }
    
    /**
     * @param EventInterface $event
     */
    public function execute(EventInterface $event)
    {
        if (!$this->canExecute($event)) {
            return;
        }
        
        /** @var \Monolog\Logger $logger */
        $logger = $this->loggerFactory->getLogger($this->configPool->debugger()->getFilename());
        
        /**
         * @todo Implement the log process.
         */
    }
}
