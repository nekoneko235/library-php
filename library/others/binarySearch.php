<?php

// 汎用的な二分探索のテンプレート
function binarySearch(array $arr, int $target, bool $isLower = true): int
{
    // index = 0 が条件を満たすこともあるので、初期値は-1
    // index = count($arr) - 1 が条件を満たさないこともあるので、初期値はcount($arr)
    [$ng, $ok] = [-1, count($arr)];

    // okとngのどちらが大きいかわからないことを考慮
    while (abs($ok - $ng) > 1) {
        $mid = intdiv(($ok + $ng), 2);

        if (isOk($arr, $mid, $target, $isLower)) $ok = $mid;
        else $ng = $mid;
    }

    return $ok;
}

// midが条件を満たすかどうか
function isOk(array $arr, int $mid, int $target, bool $isLower = true): bool
{
    if ($isLower) {
        // Lower bound
        if ($arr[$mid] >= $target) return true;
        else return false;
    } else {
        // Upper bound
        if ($arr[$mid] > $target) return true;
        else return false;
    }
}

$arr = [1, 4, 4, 7, 7, 8, 8, 11, 13, 19];

echo "-----value (Lower bound)-----\n";
echo $arr[binarySearch($arr, 4)]  . "\n";
echo $arr[binarySearch($arr, 6)]  . "\n";
echo $arr[binarySearch($arr, 7)]  . "\n";
echo $arr[binarySearch($arr, 19)] . "\n";
echo $arr[binarySearch($arr, 20)] . "\n"; // Undefined array key 10

echo "-----value (Upper bound)-----\n";
echo $arr[binarySearch($arr, 4, false)]  . "\n";
echo $arr[binarySearch($arr, 6, false)]  . "\n";
echo $arr[binarySearch($arr, 7, false)]  . "\n";
echo $arr[binarySearch($arr, 19, false)] . "\n"; // Undefined array key 10
echo $arr[binarySearch($arr, 20)] . "\n"; // Undefined array key 10
