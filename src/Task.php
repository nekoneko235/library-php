<?php

class Task
{
    public static function run(): never
    {
        exit((new self)->solver());
    }

    public function solver($io = STDIN): void
    {
        $a = trim(fgets($io));
        echo $a + $a ** 2 + $a ** 3;
    }
}

// Task::run();
