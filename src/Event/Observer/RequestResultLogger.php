<?php

declare(strict_types = 1);

namespace Frenet\Event\Observer;

use Frenet\Event\EventDataInterface;

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
     * @var \Monolog\Logger
     */
    private $logger;
    
    public function __construct(
        \Monolog\Logger $logger
    ) {
        $this->logger = $logger;
    }
    
    /**
     * @param EventDataInterface $event
     */
    public function execute(EventDataInterface $event)
    {
        if (!$this->canExecute($event)) {
            return;
        }
        
        /**
         * @todo Make the log.
         */
    }
}
