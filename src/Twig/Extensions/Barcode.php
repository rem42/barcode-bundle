<?php

namespace SGK\BarcodeBundle\Twig\Extensions;

use SGK\BarcodeBundle\Generator\Generator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Barcode extends AbstractExtension
{
    protected Generator $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'barcode',
                function ($options = []) {
                    echo $this->generator->generate($options);
                }
            ),
        ];
    }

    public function getName(): string
    {
        return 'barcode';
    }
}
