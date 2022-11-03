<?php

/**
 * コンビネーション 組み合わせ nCr (0 ≦ r ≦ n)
 *
 * @param array $arr 選ぶ元となる配列
 * @param int $r １組あたりの要素数
 * @return null|array
 */
function combination(array $arr, int $r): ?array
{
    // 重複した値を削除して，数値添字配列にする
    $arr = array_values(array_unique($arr));

    $n = count($arr);
    $result = []; // 最終的に二次元配列にして返す

    // nCr の条件に一致していなければ null を返す
    if ($r < 0 || $n < $r) {
        return null;
    }

    if ($r === 1) {
        foreach ($arr as $item) {
            $result[] = [$item];
        }
    }

    if ($r > 1) {
        // n - r + 1 回ループ
        for ($i = 0; $i < $n - $r + 1; $i++) {
            // $sliced は $i + 1 番目から末尾までの要素
            $sliced = array_slice($arr, $i + 1);
            // 再帰処理 二次元配列が返ってくる
            $recursion = combination($sliced, $r - 1);
            foreach ($recursion as $one_set) {
                array_unshift($one_set, $arr[$i]);
                $result[] = $one_set;
            }
        }
    }

    return $result;
}

// 4 C 2 = 6(組)
$arr = ['A', 'B', 'C', 'D'];
print_r(combination($arr, 2));
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
            [1] => C
        )

    [4] => Array
        (
            [0] => B
            [1] => D
        )

    [5] => Array
        (
            [0] => C
            [1] => D
        )

)
*/

// 4 C 2 = 6(組)
$arr = [2, 3, 9, 1];
print_r(combination($arr, 2));
/*
Array
(
    [0] => Array
        (
            [0] => 2
            [1] => 3
        )

    [1] => Array
        (
            [0] => 2
            [1] => 9
        )

    [2] => Array
        (
            [0] => 2
            [1] => 1
        )

    [3] => Array
        (
            [0] => 3
            [1] => 9
        )

    [4] => Array
        (
            [0] => 3
            [1] => 1
        )

    [5] => Array
        (
            [0] => 9
            [1] => 1
        )

)
*/
