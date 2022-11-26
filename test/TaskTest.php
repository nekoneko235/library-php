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
1 2 1 2
EOF,
                <<<EOF
YES
EOF
            ],
            '入力例_2' => [
                <<<EOF
7 7 7 7
EOF,
                <<<EOF
NO
EOF
            ],
            '入力例_3' => [
                <<<EOF
1 2 3 4
EOF,
                <<<EOF
NO
EOF
            ],
        ];
    }
}
