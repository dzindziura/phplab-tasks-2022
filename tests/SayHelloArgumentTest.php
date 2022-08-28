<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->sayHelloArgument($input));
    }

    public function positiveDataProvider(): array
    {
        return [
            [false ,'Hello '],
            [12 ,'Hello 12'],
            [null, 'Hello '],
            ['World', 'Hello World'],
            [true, 'Hello 1'],
            ['true', 'Hello true']
        ];
    }
}
