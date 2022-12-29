<?php

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    /**
     * @dataProvider ioProvider
     */
    public function testSampleIO(string $input, string $expected): void
    {
        $stringIo = fopen('php://memory', 'r+');
        fwrite($stringIo, $input);
        rewind($stringIo);
        $this->expectOutputRegex("/^(\s+)?\Q" . $expected . "\E(\s+)?$/");
        solver($stringIo);
    }

    public function ioProvider(): array
    {
        return [
            '入力例_1' => [
                <<<EOF
Hello,World!
EOF,
                <<<EOF
AC
EOF
            ],
            '入力例_2' => [
                <<<EOF
Hello,world!
EOF,
                <<<EOF
WA
EOF
            ],
            '入力例_3' => [
                <<<EOF
Hello!World!
EOF,
                <<<EOF
WA
EOF
            ],
        ];
    }
}
