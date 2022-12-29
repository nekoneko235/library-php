<?php

namespace library\math;

function enumDivisors(int $n): array
{
    $res = [];
    for ($i = 1; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            $res[] = $i;

            // add $n/$i if $n/$i !== $i
            if (intdiv($n, $i) !== $i) $res[] = intdiv($n, $i);
        }
    }

    // sort by ascending order
    sort($res);
    return $res;
}

print_r(enumDivisors(24));
print_r(enumDivisors(128));
print_r(enumDivisors(777));
print_r(enumDivisors(100000007));
print_r(enumDivisors(1));
/*
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 6
    [5] => 8
    [6] => 12
    [7] => 24
)
Array
(
    [0] => 1
    [1] => 2
    [2] => 4
    [3] => 8
    [4] => 16
    [5] => 32
    [6] => 64
    [7] => 128
)
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
Array
(
    [0] => 1
    [1] => 100000007
)
Array
(
    [0] => 1
)
*/
