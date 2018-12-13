<?php

declare(strict_types = 1);

namespace FrenetTest;

/**
 * Class ApiFactoryTest
 * @package FrenetTest
 */
class ApiFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function buildApi()
    {
        $token = 'someToken';
        $api = \Frenet\ApiFactory::create($token, ['test' => 'Test']);
        $this->assertInstanceOf(\Frenet\ApiInterface::class, $api);
    }
}
