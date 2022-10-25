<?php

function enumDivisors($n)
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

// echo print_r(enumDivisors(24));
