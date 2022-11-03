<?php

function enumDivisors($n): array
{
    $res = [];
    for ($i = 1; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            $res[] = $i;

            // add $n/$i if $n/$i !== $i
            if ($n / $i !== $i) $res[] = $n / $i;
        }
    }

    // sort by ascending order
    sort($res);
    return $res;
}

print_r(enumDivisors(777));
/*
Array
(
    [0] => 1
    [1] => 3
    [2] => 7
    [3] => 21
    [4] => 37
    [5] => 111
    [6] => 259
    [7] => 777
)
*/
