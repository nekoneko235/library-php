<?php

/*
Problem Sbj: A06 - How Many Guests?
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/math_and_algorithm_ai
*/

function rangeSumQuery(mixed $io = STDIN): void
{
    list($n, $q) = explode(" ", trim(fgets($io)));
    $arrA = explode(" ", trim(fgets($io)));
    for ($i = 1; $i <= $q; $i++) {
        list($l, $r) = explode(" ", trim(fgets($io)));
        $arrL[$i] = $l;
        $arrR[$i] = $r;
    }

    // 累積和の計算
    $s[0] = 0;
    for ($i = 1; $i <= $n; $i++) {
        $s[$i] = $s[$i - 1] + $arrA[$i - 1];
    }

    // 質問に答える
    for ($i = 1; $i <= $q; $i++) {
        echo $s[$arrR[$i]] - $s[$arrL[$i] - 1] . "\n";
    }
}

rangeSumQuery();
