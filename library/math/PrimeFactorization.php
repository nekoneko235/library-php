<?php

function primeFactorization($n): array
{
    $res = [];
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i !== 0) continue;
        $exp = 0; // exponents

        while ($n % $i === 0) {
            ++$exp;
            $n /= $i;
        }

        $res[] = [$i, $exp];
    }

    if ($n !== 1) $res[] = [$n, 1];

    return $res;
}

print_r(primeFactorization(24));
/*
arg: 1
output:
(
)

arg: 2
output:
Array
(
    [0] => Array
        (
            [0] => 2
            [1] => 1
        )
)

arg: 17
output:
Array
(
    [0] => Array
        (
            [0] => 17
            [1] => 1
        )

)

arg: 24
output:
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
*/
