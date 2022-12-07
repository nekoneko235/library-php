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
        $res = $in = $out = [];
        foreach (new DirectoryIterator("tests\io\in") as $file) {
            if ($file->isFile()) {
                $in[] = rtrim(file_get_contents("tests\io\in\\" . $file->getFilename()), "\n");
            }
        }
        foreach (new DirectoryIterator("tests\io\out") as $file) {
            if ($file->isFile()) {
                $out[] = rtrim(file_get_contents("tests\io\out\\" . $file->getFilename(), "\n"));
            }
        }
        for ($i = 0; $i < count($in); $i++) {
            $res[] = [$in[$i], $out[$i]];
        }
        return $res;
    }
}
