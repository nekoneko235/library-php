<?php

declare(strict_types=1);

namespace library\math;

function convertBinaryToDecimal(string $n): int
{
    $res = 0;
    $tmp = strlen($n) - 1;
    for ($i = $tmp, $j = 0; $i >= 0; $i--, $j++) {
        $res += (1 << $i) * $n[$j];
    }
    return $res;
}

echo convertBinaryToDecimal("1101");
// echo convertBinaryToDecimal("1");
// echo convertBinaryToDecimal("100101");
// echo convertBinaryToDecimal("10000000");
