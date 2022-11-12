<?php

namespace library\others\sort;

$arr = [
    [2, "a", 1],
    [2, "r", 5],
    [2, "n", 3],
    [2, "i", 9],
    [2, "p", 2],
    [2, "c", 10],
    [2, "x", 3],
    [2, "v", 4],
    [2, "f", 1],
    [2, "u", 7],
    [2, "e", 6],
    [2, "b", 4],
];
sort($arr);
rsort($arr);
print_r($arr);

// 以下でも可能
// array_multisort($arr);
// var_dump($arr);


$fruits = [
    "d" => "lemon",
    "a" => "orange",
    "b" => "banana",
    "c" => "apple"
];

/* 連想配列を値でソート */
asort($fruits);
arsort($fruits);

/* 連想配列をキーでソート */
ksort($fruits);
krsort($fruits);
print_r($fruits);


// 複数の配列をソートする
$arr1 = array(10, 100, 100, 0);
$arr2 = array(1, 3, 2, 4);
array_multisort($arr1, $arr2);

var_dump($arr1);
var_dump($arr2);


// 多次元の配列をソートする
$arr = [
    ["10", 11, 100, 100, "a"],
    [1,  2, "2",   3,   1]
];

array_multisort(
    $arr[0],
    SORT_ASC,
    SORT_STRING,
    $arr[1],
    SORT_NUMERIC,
    SORT_DESC
);
var_dump($arr);
