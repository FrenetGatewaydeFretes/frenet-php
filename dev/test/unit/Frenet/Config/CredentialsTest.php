<?php

declare(strict_types = 1);

namespace FrenetTest\Config;

use FrenetTest\TestCase;

/**
 * Class CredentialsTest
 *
 * @package FrenetTest\Config
 */
class CredentialsTest extends TestCase
{
    /**
     * @var \Frenet\Config\Credentials
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Config\Credentials::class);
    }
    
    /**
     * @test
     */
    public function tokenSetterAndGetter()
    {
        $token = 'token_test';
        $this->assertInstanceOf(\Frenet\Config\Credentials::class, $this->object->setToken($token));
        $this->assertEquals($token, $this->object->getToken());
    }
}
