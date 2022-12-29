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
        // "Compilation failed"の場合は、OutputRegexの代わりにOutputStringを実行する
        // $this->expectOutputString($expected);
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
