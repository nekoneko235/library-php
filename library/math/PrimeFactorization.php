<?php

function primeFactorization($n)
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

echo print_r(primeFactorization(17));
