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
        $this->expectOutputRegex("/^" . $expected . "(\s+)?$/");
        solver($stringIo);
    }

    public function ioProvider(): array
    {
        return [
            '入力例_1' => [
                <<<EOF
1 2
3 4
EOF,
                <<<EOF
-2
EOF
            ],
            '入力例_2' => [
                <<<EOF
0 -1
1 0
EOF,
                <<<EOF
1
EOF
            ],
            '入力例_3' => [
                <<<EOF
100 100
100 100
EOF,
                <<<EOF
0
EOF
            ],
        ];
    }
}
