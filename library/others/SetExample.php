<?php
// 集合を作成する場合、array_values(array_unique($arr))メソッドを使う
// $arr = array_values(array_unique(explode(" ", trim(fgets(STDIN)))));
$arr = [1, 2, 4, 2, 8, 9, 3, 5, 7, 9, 3];
$arr = array_values(array_unique($arr));
// print_r($arr);


// 集合の差
$arr1 = array("a" => "green", "red", "blue", "red");
$arr2 = array("b" => "green", "yellow", "red");
$arr1 = [3, 1, 9, 4, 2, 7];
$arr2 = [2, 1, 7, 4, 2, 3];
$res = array_diff($arr1, $arr2);

// print_r($res);


// 集合の積
$arr1 = ["a" => "green", "red", "blue"];
$arr2 = ["a" => "green", "yellow", "red"];
$res = array_intersect($arr1, $arr2);
// print_r($res);


// 集合の和
$arr1 = ["a" => "green", "red", "blue"];
$arr2 = ["a" => "green", "yellow", "red"];
$arr1 = [3, 1, 9, 4, 2, 7];
$arr2 = [2, 1, 7, 4, 2, 3];
$union = array_unique(array_merge($arr1, $arr2));

// print_r($union);
