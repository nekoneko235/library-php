<?php

/*
Problem Sbj: A54 - Map
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_bb
*/

namespace library\datastructures;

function map($io = STDIN): void
{
    $q = trim(fgets($io));
    $map = [];
    for ($i = 0; $i < $q; $i++) {
        $arr = explode(" ", trim(fgets($io)));
        switch ($arr[0]) {
            case '1':
                $map[$arr[1]] = $arr[2];
                break;
            case '2':
                echo $map[$arr[1]] . "\n";
                break;
        }
    }
}

map();
