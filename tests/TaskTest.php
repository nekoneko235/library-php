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
