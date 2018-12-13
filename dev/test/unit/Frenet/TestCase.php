<?php

declare(strict_types = 1);

namespace FrenetTest;

/**
 * Class TestCase
 * @package FrenetTest
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Faker\Generator
     */
    private $faker;
    
    /**
     * @param       $objectClass
     * @param array $parameters
     * @return mixed
     */
    protected function createObject($objectClass, array $parameters = [])
    {
        $result = null;
        $config = [
            'definitions' => __DIR__ . '/../../../../src/app/config.php'
        ];
        
        try {
            /** @var \DI\Container $container */
            $container = \Frenet\Framework\DI\ContainerRepository::getInstance($config);
            $result = $container->make($objectClass, $parameters);
        } catch (\DI\DependencyException $e) {
        } catch (\DI\NotFoundException $e) {
        } catch (\Exception $e) {
        }
        
        return $result;
    }
    
    /**
     * @return \Faker\Generator
     */
    protected function faker()
    {
        if (!$this->faker) {
            $this->faker = \Faker\Factory::create();
        }
        
        return $this->faker;
    }
}
