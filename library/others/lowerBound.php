<?php

// Lower-bound
function lowerBound(array $arr, int $target): int
{
    // index = 0 が条件を満たすこともあるので、初期値は-1
    // index = count($arr) - 1 が条件を満たさないこともあるので、初期値はcount($arr)
    [$ng, $ok] = [-1, count($arr)];

    // okとngのどちらが大きいかわからないことを考慮
    while (abs($ok - $ng) > 1) {
        $mid = intdiv(($ok + $ng), 2);

        if ($arr[$mid] >= $target) $ok = $mid;
        else $ng = $mid;
    }

    return $ok;
}

$arr = [1, 4, 4, 7, 7, 8, 8, 11, 13, 19];

echo "-----value (Lower bound)-----\n";
echo $arr[binarySearch($arr, 4)]  . "\n";
echo $arr[binarySearch($arr, 6)]  . "\n";
echo $arr[binarySearch($arr, 7)]  . "\n";
echo $arr[binarySearch($arr, 19)] . "\n";
echo $arr[binarySearch($arr, 20)] . "\n"; // Undefined array key 10
