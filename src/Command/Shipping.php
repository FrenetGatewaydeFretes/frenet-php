<?php

declare(strict_types = 1);

namespace Frenet\Command;

use Frenet\Api;
use Frenet\ApiInterface;
use Frenet\Framework\DI\ContainerRepository;
use Frenet\Command\Shipping\QuoteInterface;

/**
 * Class Shipping
 * @package Frenet\Command
 */
class Shipping implements ShippingInterface
{
    /**
     * @var \DI\Container
     */
    private static $container;

    /**
     * @var array
     */
    public static $config = [
        'definitions' => FRENET_DIR_DI_CONFIG
    ];

    /**
     * @var array
     */
    private static $customConfig = [];

    /**
     * @var Shipping\InfoFactory
     */
    private $infoFactory;

    /**
     * Shipping constructor.
     * @param Shipping\InfoFactory  $infoFactory
     */
    public function __construct(
        Shipping\InfoFactory $infoFactory,
        Shipping\QuoteFactory $quoteFactory
    ) {
        $this->infoFactory = $infoFactory;
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

        if (!empty($config)) {
            /** If there's a customized configuration the application can load it. */
            self::$customConfig = (array) $config;
        }

        self::setupContainer();

        $quote = self::createQuoteInstance();

        //self::$container->set(Api::class, $api);

        //$quote = $this->quoteFactory->create();
        return $quote;
    }

    /**
     *
     * @return Command\Shipping\Quote::class
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    private static function createQuoteInstance()
    {
        // Command\Shipping\Quote::class
        return self::$container->make(QuoteInterface::class);
    }

    /**
     * Setup the container.
     *
     * @throws \Frenet\Framework\Exception\ExceptionInterface
     */
    private static function setupContainer()
    {
        self::$container = ContainerRepository::getInstance(self::getConfig());
    }

    /**
     * @return array
     */
    private static function getConfig()
    {
        $config = array_merge_recursive(self::$config, self::$customConfig);
        return $config;
    }
}
