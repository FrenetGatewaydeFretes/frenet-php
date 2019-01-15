<?php

declare(strict_types = 1);

namespace Frenet\Framework\Object;

/**
 * Class FactoryAbstract
 * @package Frenet\Framework\Object
 */
abstract class FactoryAbstract implements FactoryInterface
{
    /**
     * @var string
     */
    protected $objectClass = null;

    /**
     * @var \Frenet\Framework\ObjectManager
     */
    private $objectManager;

    /**
     * FactoryAbstract constructor.
     * @param \Frenet\Framework\ObjectManager $objectManager
     */
    public function __construct(
        \Frenet\Framework\ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters = [])
    {
        try {
            /** @var \GuzzleHttp\ClientInterface $instance */
            $instance = $this->objectManager->create($this->objectClass, $parameters);
        } catch (\Exception $e) {
            /** @todo debug error or throw exception. */
            return false;
        }

        return $instance;
    }
}
