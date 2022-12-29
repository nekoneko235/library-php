<?php

namespace library\math;

function convertDecimalToBinary(int $n, int $digit): string
{
    $binaryString = '';
    for ($i = $digit; $i >= 0; $i--) {
        $divisor = (1 << $i);
        $binaryString .= ($n / $divisor) % 2;
    }
    return $binaryString;
}

// echo convertDecimalToBinary(13, 9);
// echo convertDecimalToBinary(37, 9);
echo convertDecimalToBinary(1000, 9);
