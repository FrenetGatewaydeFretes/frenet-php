<?php

declare(strict_types = 1);

namespace FrenetTest\Command\Postcode;

use FrenetTest\TestCase;
use Frenet\Command\Postcode\AddressInterface;

/**
 * Class AddressTest
 * @package FrenetTest\Command\Postcode
 */
class AddressTest extends TestCase
{
    /**
     * @var AddressInterface
     */
    private $object;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $connection;
    
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $response;
    
    protected function setUp()
    {
        $this->response = $this->createMock(\Frenet\Framework\Http\Response\ResponseSuccessInterface::class);
        $this->connection = $this->createMock(\Frenet\Service\ConnectionInterface::class);
        
        $this->object = $this->createObject(AddressInterface::class, [
            'connection' => $this->connection,
        ]);
    }
    
    /**
     * @test
     */
    public function getPostcode()
    {
        $this->object->setPostcode('06395-010');
        $this->assertEquals('06395-010', $this->object->getPostcode());
    }
    
    /**
     * @test
     */
    public function getUrlPath()
    {
        $this->object->setPostcode('06395-010');
        $this->assertEquals('CEP/Address/06395010', $this->object->getUrlPath());
    }
    
    /**
     * @test
     */
    public function getRequestMethod()
    {
        $this->assertEquals('GET', $this->object->getRequestMethod());
    }
    
    /**
     * @test
     */
    public function setOptionalConfig()
    {
        $config = [
            'postcode' => '06395-010',
            'null_value' => null,
            null => null,
            false => false,
        ];
        
        $this->assertInstanceOf(AddressInterface::class, $this->object->setOptionalConfig($config));
        $this->assertEquals('06395-010', $this->object->getPostcode());
    }
    
    /**
     * @test
     */
    public function toArray()
    {
        $postcode = '06395-010';
        
        $this->object->setPostcode($postcode);
        $this->assertEquals(['postcode' => $postcode], $this->object->toArray());
    }
    
    /**
     * @test
     */
    public function toJson()
    {
        $postcode = '06395-010';
        
        $this->object->setPostcode($postcode);
        $this->assertEquals(json_encode(['postcode' => $postcode]), $this->object->toJson());
    }
    
    /**
     * @test
     */
    public function execute()
    {
        $result = [
            "CEP" => "06395-010",
            "UF" => "SP",
            "City" => "Carapicuíba",
            "District" => "Cidade Ariston Estela Azevedo",
            "Street" => "Avenida Marginal",
            "Message" => "ok",
        ];
        
        $this->response->expects($this->once())->method('getBody')->willReturn($result);
        $this->connection->expects($this->once())->method('request')->willReturn($this->response);
        
        $postcode = '06395-010';
        $this->object->setPostcode($postcode);
    
        /**
         * @var \Frenet\ObjectType\Entity\Postcode\AddressInterface
         */
        $entity = $this->createObject(\Frenet\ObjectType\Entity\Postcode\AddressInterface::class, [
            'data' => $result
        ]);
        
        $this->assertEquals($entity->export(), $this->object->execute()->export());
    }
}
