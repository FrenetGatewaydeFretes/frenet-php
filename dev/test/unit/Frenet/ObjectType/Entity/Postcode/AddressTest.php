<?php

declare(strict_types = 1);

/**
 * Class AddressTest
 * @package FrenetTest\ObjectType\Entity\Postcode
 */
class AddressTest extends \FrenetTest\TestCase
{
    
    /**
     * @var \Frenet\ObjectType\Entity\Postcode\AddressInterface
     */
    private $object;
    
    /**
     * @var array
     */
    private $data = [
        "CEP" => "06395-010",
        "UF" => "SP",
        "City" => "Carapicuíba",
        "District" => "Cidade Ariston Estela Azevedo",
        "Street" => "Avenida Marginal",
        "Message" => "ok",
    ];
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\ObjectType\Entity\Postcode\AddressInterface::class, [
            'data' => $this->data
        ]);
    }
    
    /**
     * @test
     */
    public function getPostcode()
    {
        $this->assertEquals("06395-010", $this->object->getPostcode());
    }
    
    /**
     * @test
     */
    public function getRegion()
    {
        $this->assertEquals("SP", $this->object->getRegion());
    }
    
    /**
     * @test
     */
    public function getCity()
    {
        $this->assertEquals("Carapicuíba", $this->object->getCity());
    }
    
    /**
     * @test
     */
    public function getDistrict()
    {
        $this->assertEquals("Cidade Ariston Estela Azevedo", $this->object->getDistrict());
    }
    
    /**
     * @test
     */
    public function getStreet()
    {
        $this->assertEquals("Avenida Marginal", $this->object->getStreet());
    }
    
    /**
     * @test
     */
    public function exportToString()
    {
        $expected = [
            "postcode" => "06395-010",
            "region" => "SP",
            "city" => "Carapicuíba",
            "district" => "Cidade Ariston Estela Azevedo",
            "street" => "Avenida Marginal"
        ];
        
        $this->assertEquals(json_encode($expected), (string) $this->object);
    }
}
