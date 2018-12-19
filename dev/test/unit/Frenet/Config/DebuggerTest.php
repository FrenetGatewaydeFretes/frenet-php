<?php

declare(strict_types = 1);

namespace FrenetTest\Config;

use FrenetTest\TestCase;

/**
 * Class DebuggerTest
 *
 * @package FrenetTest\Config
 */
class DebuggerTest extends TestCase
{
    /**
     * @var \Frenet\Config\Debugger
     */
    private $object;
    
    protected function setUp()
    {
        $this->object = $this->createObject(\Frenet\Config\Debugger::class);
    }
    
    /**
     * @test
     */
    public function isEnabled()
    {
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->isEnabled(true));
        $this->assertTrue($this->object->isEnabled());
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->isEnabled(false));
        $this->assertFalse($this->object->isEnabled());
    }
    
    /**
     * @test
     */
    public function filenameSetterAndGetter()
    {
        $this->assertNotEmpty($this->object->getFilename());
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->setFilename(''));
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->setFilename('sample_filename.log'));
        $this->assertEquals('sample_filename.log', $this->object->getFilename());
    }
    
    /**
     * @test
     */
    public function filePathSetterAndGetter()
    {
        /** Invalid Path */
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->setFilePath(''));
        
        /** Invalid Path */
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->setFilePath('/some/invalid/path/'));
        $this->assertEmpty($this->object->getFilePath());
    
        /** Valid Path */
        $this->assertInstanceOf(\Frenet\Config\Debugger::class, $this->object->setFilePath(FRENET_DIR_ROOT));
        $this->assertEquals(FRENET_DIR_ROOT, $this->object->getFilePath());
    }
}
