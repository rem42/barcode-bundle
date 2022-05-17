<?php

namespace SGK\BarcodeBundle\Tests\Generator;

use PHPUnit\Framework\TestCase;
use SGK\BarcodeBundle\Generator\Generator;

/**
 * @internal
 */
class GeneratorTest extends TestCase
{
    public function getOptions(): array
    {
        return [
            [
                [
                    'code'   => '0123456789',
                    'type'   => 'c128',
                    'format' => 'html',
                    'width'  => 2,
                    'height' => 30,
                    'color'  => 'black',
                ],
            ],
            [
                [
                    'code'   => '0123456789',
                    'type'   => 'c39',
                    'format' => 'svg',
                ],
            ],
            [
                [
                    'code'   => '0123456789',
                    'type'   => 'qrcode',
                    'format' => 'png',
                    'width'  => 5,
                    'height' => 5,
                    'color'  => [0, 0, 0],
                ],
            ],
        ];
    }

    /**
     * @dataProvider getOptions
     */
    public function testGenerate(array $options): void
    {
        $generator = new Generator();

        $this->assertTrue(\is_string($generator->generate($options)));
    }

    public function getErrorOptions(): array
    {
        return [
            [
                [
                    'code' => '0123456789',
                ],
            ],
            [
                [
                    'code'   => '0123456789',
                    'type'   => 'Unknown Type',
                    'format' => 'html',
                ],
            ],
            [
                [
                    'code'   => '0123456789',
                    'type'   => 'c128',
                    'format' => 'Unknown Format',
                ],
            ],
            [
                [
                    'code'   => '0123456789',
                    'type'   => 'c39',
                    'format' => 'svg',
                    'width'  => 'width is int',
                ],
            ],
            [
                [
                    'code'   => '0123456789',
                    'type'   => 'qrcode',
                    'format' => 'png',
                    'width'  => 5,
                    'height' => 5,
                    'color'  => 5,
                ],
            ],
        ];
    }

    /**
     * @dataProvider getErrorOptions
     */
    public function testConfigureOptions($options = []): void
    {
        $this->expectException(\Exception::class);
        $generator = new Generator();

        $generator->generate($options);
    }
}
