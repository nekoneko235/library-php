<?php

/*
Problem Sbj: A51 - Stack
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_ay
*/

function stack($io = STDIN): void
{
    $q = trim(fgets($io));
    $stack = [];
    for ($i = 0; $i < $q; $i++) {
        $arr = explode(" ", trim(fgets($io)));
        switch ($arr[0]) {
            case '2':
                echo end($stack) . "\n";
                break;
            case '3':
                array_pop($stack);
                break;
            default:
                array_push($stack, $arr[1]);
                break;
        }
    }
}

stack();
