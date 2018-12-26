<?php

declare(strict_types = 1);

namespace FrenetTest\Service;

use FrenetTest\TestCase;

/**
 * Class ResultTest
 *
 * @package FrenetTest\Service
 */
class ResultTest extends TestCase
{
    /**
     * @var \Frenet\Service\ResultInterface
     */
    private $object;
    
    /**
     * @var \Frenet\Framework\Http\Response\ResponseInterface
     */
    private $response;
    
    protected function setUp()
    {
        $this->response = $this->createMock(\Frenet\Framework\Http\Response\ResponseInterface::class);
        $this->object = $this->createObject(\Frenet\Service\ResultInterface::class, [
            'response' => $this->response,
        ]);
    }
    
    /**
     * @test
     */
    public function getResponse()
    {
        $this->assertInstanceOf(
            \Frenet\Framework\Http\Response\ResponseInterface::class,
            $this->object->getResponse()
        );
    }
    
    /**
     * @test
     */
    public function parseFalse()
    {
        $this->assertFalse(
            $this->object->parse()
        );
    }
}
