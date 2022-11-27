<?php

/*
Problem Sbj: A07 - Event Attendance
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_g
*/

function pointQueryAfterRangeAdd($io = STDIN): void
{
    $d = trim(fgets($io));
    $n = trim(fgets($io));
    for ($i = 1; $i <= $n; $i++) {
        list($l, $r) = explode(" ", trim(fgets($io)));
        $L[$i] = $l;
        $R[$i] = $r;
    }

    // 前日比に加算
    $D = array_fill(1, $d, 0);
    for ($i = 1; $i <= $n; $i++) {
        $D[$L[$i]] += 1;
        $D[$R[$i] + 1] -= 1;
    }

    // 累積和をとる->出力
    $S[0] = 0;
    for ($i = 1; $i <= $d; $i++) {
        $S[$i] = $S[$i - 1] + $D[$i];
    }
    foreach ($S as $key => $value) {
        if ($key == 0) continue;
        echo $value . "\n";
    }
}

pointQueryAfterRangeAdd();
