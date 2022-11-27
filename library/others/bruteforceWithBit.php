<?php

/*
Problem Sbj: Exhaustive Search
Problem URL: https://onlinejudge.u-aizu.ac.jp/courses/lesson/1/ALDS1/all/ALDS1_5_A
*/

function bruteforceWithBit(mixed $io = STDIN): void
{
    $n = trim(fgets($io));
    $arr = explode(" ", trim(fgets($io)));
    $q = trim(fgets($io));
    $arrQ = explode(" ", trim(fgets($io)));
    $sums = [];

    for ($bit = 0; $bit < (1 << $n); $bit++) {
        $sum = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($bit & (1 << $i))
                $sum += $arr[$i];
        }
        $sums[] = $sum;
    }

    for ($i = 0; $i < $q; $i++) {
        if (in_array($arrQ[$i], $sums)) {
            echo "yes\n";
        } else {
            echo "no\n";
        }
    }
}

bruteforceWithBit();
