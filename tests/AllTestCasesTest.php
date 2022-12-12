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
        $res = $in = $out = $fileName = [];
        foreach (new DirectoryIterator("tests/io/in/") as $file) {
            if ($file->isFile()) {
                $fileName[] = $file->getFilename();
                $in[] = file_get_contents("tests/io/in/" . $file->getFilename());
            }
        }
        foreach (new DirectoryIterator("tests/io/out/") as $file) {
            if ($file->isFile()) {
                $out[] = rtrim(file_get_contents("tests/io/out/" . $file->getFilename(), "\n"));
            }
        }
        for ($i = 0; $i < count($in); $i++) {
            $res[$fileName[$i]] = [$in[$i], $out[$i]];
        }
        return $res;
    }
}
