<?php

declare(strict_types = 1);

namespace FrenetTest\Model\Normalizer;

use FrenetTest\TestCase;

/**
 * Class PostcodeNormalizer
 * @package FrenetTest\Model\Normalizer
 */
class PostcodeNormalizerTest extends TestCase
{
    /**
     * @test
     */
    public function normalize()
    {
        /** @var \Frenet\Model\Normalizer\PostcodeNormalizer $model */
        $model = $this->createObject(\Frenet\Model\Normalizer\PostcodeNormalizer::class);
        $this->assertEquals('06395010', $model->normalize('06395-010'));
        $this->assertEquals('06395010', $model->normalize('6395-010'));
        $this->assertEquals('06395010', $model->normalize('6395010'));
        $this->assertEquals('06395010', $model->normalize('6395--------010'));
        $this->assertEquals('06395010', $model->normalize('6395--------010 '));
        $this->assertEquals('06395010', $model->normalize(' 6395-010 '));
        $this->assertEquals('06395010', $model->normalize('6a3b9c5d0e1f0g'));
        $this->assertNotEquals('06395010', $model->normalize('06395-001'));
        $this->assertNull($model->normalize(''));
    }
}
