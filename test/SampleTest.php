<?php

require_once 'src\Sample.php';

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    private static $sample;

    public static function setUpBeforeClass(): void
    {
        SampleTest::$sample = new Sample();
    }

    /**
     * @dataProvider ioProvider
     */
    public function testSampleIO(string $input, string $expected): void
    {
        $stringIo = fopen("data://text/plain,$input", 'r');
        $this->expectOutputString($expected);
        SampleTest::$sample->solver($stringIo);
    }

    public function ioProvider(): array
    {
        return [
            'Sample Input 1' => [
                <<<EOT
        2
        EOT,
                <<<EOT
        14
        EOT

            ],
            'Sample Input 2' => [
                <<<EOT
        10
        EOT,
                <<<EOT
        1110
        EOT
            ]
        ];
    }
}
