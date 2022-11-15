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

    public function test_Sample_IO_1(): void
    {
        $input = <<<EOT
        2
        EOT;
        $output = <<<EOT
        14
        EOT;
        $stringIo = fopen("data://text/plain,$input", 'r');
        $this->expectOutputString($output);
        SampleTest::$sample->solver($stringIo);
    }

    public function test_Sample_IO_2(): void
    {
        $input = <<<EOT
        10
        EOT;
        $output = <<<EOT
        1110
        EOT;
        $stringIo = fopen("data://text/plain,$input", 'r');
        $this->expectOutputString($output);
        SampleTest::$sample->solver($stringIo);
    }
}
