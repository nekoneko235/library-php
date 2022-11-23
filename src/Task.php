<?php

function solver($io = STDIN): void
{
    $a = trim(fgets($io));
    echo $a + $a ** 2 + $a ** 3;
}

// solver();
