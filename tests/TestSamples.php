<?php

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    /**
     * @dataProvider ioProvider
     */
    public function testSampleIO(string $input, string $expected): void
    {
        $stringIo = fopen("data://text/plain,$input", 'r');
        $this->expectOutputString($expected);
        solver($stringIo);
    }

    public function ioProvider(): array
    {
        return [
            '入力例_1' => [
                <<<EOF
5
coder
EOF,
                <<<EOF
2
EOF
            ],
            '入力例_2' => [
                <<<EOF
6
topsic
EOF,
                <<<EOF
-1
EOF
            ],
            '入力例_3' => [
                <<<EOF
9
aabbbcccc
EOF,
                <<<EOF
3
EOF
            ],
        ];
    }
}
