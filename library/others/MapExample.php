<?php

// array_map()の例
function cube($n)
{
    return $n * $n * $n;
}

$arr = [1, 2, 3, 4, 5];
$new_arr = array_map('cube', $arr);
print_r($new_arr);


// ラムダ関数を使用する例
print_r(array_map(fn ($value): int => $value * 2, range(1, 5)));


// 配列のzip操作を行う
$a = [1, 2, 3, 4, 5];
$b = ['one', 'two', 'three', 'four', 'five'];
$c = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

$d = array_map(null, $a, $b, $c);
print_r($d);


// array_map()と連想配列
$arr = [
    'v1' => 'First release',
    'v2' => 'Second release',
    'v3' => 'Third release'
];

$callback = fn (string $k, string $v): string => "$k was the $v";
$result = array_map($callback, array_keys($arr), array_values($arr));

var_dump($result);
