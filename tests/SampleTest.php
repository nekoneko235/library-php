<?php

use PHPUnit\Framework\TestCase;
use Topsic\Sample;

class SampleTest extends TestCase
{
    private static $task;

    public static function setUpBeforeClass(): void
    {
        SampleTest::$task = new Task();
    }

    /**
     * @dataProvider ioProvider
     */
    public function testSampleIO(string $input, string $expected): void
    {
        $stringIo = fopen("data://text/plain,$input", 'r');
        $this->expectOutputString($expected);
        SampleTest::$task->solver($stringIo);
    }

    public function ioProvider(): array
    {
        return [
            '入力例_1' => [
                <<<EOF
2
EOF,
                <<<EOF
14
EOF
            ],
            '入力例_2' => [
                <<<EOF
10
EOF,
                <<<EOF
1110
EOF
            ],
        ];
    }
}