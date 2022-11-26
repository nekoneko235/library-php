<?php

/*
Problem Sbj: One-stroke-Path
Problem URL: https://atcoder.jp/contests/abc054/tasks/abc054_c
*/

function bruteforceWithPermutation(mixed $io = STDIN): void
{
    // グラフを隣接行列で管理する
    $graph = [[]];

    list($n, $m) = explode(" ", trim(fgets($io)));
    for ($i = 0; $i < $m; $i++) {
        list($a, $b) = explode(" ", trim(fgets($io)));
        $graph[$a][$b] = $graph[$b][$a] = true;
    }

    // 順列
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = $i + 1;
    }

    // 順列を全部試す
    $res = 0;
    do {
        if ($arr[0] != 1) break;

        $ok = true;
        for ($i = 0; $i + 1 < $n; $i++) {
            $from = $arr[$i];
            $to = $arr[$i + 1];
            if (!$graph[$from][$to]) $ok = false;
        }
        if ($ok) ++$res;
    } while (nextPermutation($arr));

    echo $res;
}

bruteforceWithPermutation();

function nextPermutation(array &$input): bool
{
    $inputCount = count($input);

    // the head of the suffix
    $i = $inputCount - 1;

    // find longest suffix
    while ($i > 0 && $input[$i] <= $input[$i - 1]) {
        $i--;
    }

    //are we at the last permutation already?
    if ($i <= 0) {
        return false;
    }

    // get the pivot
    $pivotIndex = $i - 1;

    // find rightmost element that exceeds the pivot
    $j = $inputCount - 1;
    while ($input[$j] <= $input[$pivotIndex]) {
        $j--;
    }

    // swap the pivot with j
    $temp = $input[$pivotIndex];
    $input[$pivotIndex] = $input[$j];
    $input[$j] = $temp;

    // reverse the suffix
    $j = $inputCount - 1;

    while ($i < $j) {
        $temp = $input[$i];
        $input[$i] = $input[$j];
        $input[$j] = $temp;

        $i++;
        $j--;
    }

    return true;
}
