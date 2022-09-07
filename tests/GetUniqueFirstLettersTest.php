<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    protected function setUp(): void
    {
        require_once __DIR__ . '/../src/web/functions.php';
    }

    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $expected
     * @throws Exception
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    /**
     * @dataProvider negativeDataProvider
     * @param $input
     * @throws Exception
     */
    public function testNegative($input)
    {
        $this->expectException(Exception::class);

        getUniqueFirstLetters($input);
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [
                    ["name" => "Albuquerque Sunport International Airport"],
                    ["name" => "Newark Liberty International Airport"],
                    ["name" => "Houston Intercontinental Airport"],
                    ["name" => "Aoston Logan International Airport"],
                ],
                ['A', 'H', 'N'],
            ],
            [
                [],
                [],
            ],
            [
                [
                    ["name" => "Detroit Metro Airport"],
                    ["name" => "Detroit Metro Airport"],
                    ["name" => "Newark Liberty International Airport"],
                    ["name" => "Ft. Lauderdale Hollywood International Airport"],
                ],
                ['D', 'F', 'N'],
            ],
        ];
    }

    public function negativeDataProvider(): array
    {
        return [
            [["name" => 1]],
            [["name" => false]],
            [["name" => null]],
            [["amazing" => "Airport code"]],
        ];
    }
}