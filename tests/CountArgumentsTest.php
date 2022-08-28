<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->countArguments(...$input));
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [],
                [
                    'argument_count' => 0,
                    'argument_values' => [],
                ]
            ],
            [
                ['Alex', 'Ivan', 'Petro'],
                [
                    'argument_count' => 3,
                    'argument_values' => ['Alex', 'Ivan', 'Petro'],
                ]
            ],
            [
                ['Alex', 'Ivan'],
                [
                    'argument_count' => 2,
                    'argument_values' => ['Alex', 'Ivan'],
                ]
            ],
        ];
    }
}
