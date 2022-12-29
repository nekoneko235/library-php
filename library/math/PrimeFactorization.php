<?php

namespace library\math;

function primeFactorization(int $n): array
{
    $res = [];
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i !== 0) continue;
        $exp = 0; // exponents

        while ($n % $i === 0) {
            ++$exp;
            $n = intdiv($n, $i);
        }

        $res[] = [$i, $exp];
    }

    if ($n !== 1) $res[] = [$n, 1];

    return $res;
}

print_r(primeFactorization(24));
print_r(primeFactorization(128));
print_r(primeFactorization(777));
print_r(primeFactorization(100000007));
print_r(primeFactorization(1));
/*
Array
(
    [0] => Array
        (
            [0] => 2
            [1] => 3
        )

    [1] => Array
        (
            [0] => 3
            [1] => 1
        )

)
Array
(
    [0] => Array
        (
            [0] => 2
            [1] => 7
        )

)
Array
(
    [0] => Array
        (
            [0] => 3
            [1] => 1
        )

    [1] => Array
        (
            [0] => 7
            [1] => 1
        )

    [2] => Array
        (
            [0] => 37
            [1] => 1
        )

)
Array
(
    [0] => Array
        (
            [0] => 100000007
            [1] => 1
        )

)
Array
(
)
*/
