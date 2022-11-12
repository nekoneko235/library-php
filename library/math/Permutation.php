<?php

declare(strict_types=1);

namespace library\math;

/**
 * Permutation 順列 nPr (r ≦ n)
 *
 * @param array $arr 並べる元となる配列
 * @param int $r 並べる1列（1セット）あたりの要素数
 * @return null|array
 */
function permutation(array $arr, int $r): ?array
{
    // 重複した値を削除して，数値添字配列にする
    $arr = array_values(array_unique($arr));

    $n = count($arr);
    $result = []; // 最終的に二次元配列にして返す

    // nPr の条件に一致していなければ null を返す
    if ($n < 1 || $n < $r) {
        return null;
    }

    if ($r === 1) {
        foreach ($arr as $item) {
            $result[] = [$item];
        }
    }

    if ($r > 1) {
        // $item が先頭になる順列を算出する
        foreach ($arr as $key => $item) {
            // $item を除いた配列を作成
            $newArr = array_filter($arr, function ($k) use ($key) {
                return $k !== $key;
            }, ARRAY_FILTER_USE_KEY);
            // 再帰処理 二次元配列が返ってくる
            $recursion = permutation($newArr, $r - 1);
            foreach ($recursion as $one_set) {
                array_unshift($one_set, $item);
                $result[] = $one_set;
            }
        }
    }

    return $result;
}

// 4 P 2 = 12
$arr = ['A', 'B', 'C', 'D'];
print_r(permutation($arr, 2));
/*
Array
(
    [0] => Array
        (
            [0] => A
            [1] => B
        )

    [1] => Array
        (
            [0] => A
            [1] => C
        )

    [2] => Array
        (
            [0] => A
            [1] => D
        )

    [3] => Array
        (
            [0] => B
            [1] => A
        )

    [4] => Array
        (
            [0] => B
            [1] => C
        )

    [5] => Array
        (
            [0] => B
            [1] => D
        )

    [6] => Array
        (
            [0] => C
            [1] => A
        )

    [7] => Array
        (
            [0] => C
            [1] => B
        )

    [8] => Array
        (
            [0] => C
            [1] => D
        )

    [9] => Array
        (
            [0] => D
            [1] => A
        )

    [10] => Array
        (
            [0] => D
            [1] => B
        )

    [11] => Array
        (
            [0] => D
            [1] => C
        )

)
*/

// 4 P 3 = 12
// 重複があるので、3 P 3 になる
$arr = [3, 2, 3, 9];
print_r(permutation($arr, 3));
/*
Array
(
    [0] => Array
        (
            [0] => 3
            [1] => 2
            [2] => 9
        )

    [1] => Array
        (
            [0] => 3
            [1] => 9
            [2] => 2
        )

    [2] => Array
        (
            [0] => 2
            [1] => 3
            [2] => 9
        )

    [3] => Array
        (
            [0] => 2
            [1] => 9
            [2] => 3
        )

    [4] => Array
        (
            [0] => 9
            [1] => 3
            [2] => 2
        )

    [5] => Array
        (
            [0] => 9
            [1] => 2
            [2] => 3
        )

)
*/
