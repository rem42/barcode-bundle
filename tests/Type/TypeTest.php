<?php

namespace SGK\BarcodeBundle\Tests\Type;

use PHPUnit\Framework\TestCase;
use SGK\BarcodeBundle\Type\Type;

/**
 * @internal
 */
class TypeTest extends TestCase
{
    public function testInvalidArgumentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $type = new Type();
        $type->getDimension('Unknown Type');
    }
}
