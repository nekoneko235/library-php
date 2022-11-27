<?php

/*
Problem Sbj: A51 - Stack
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_ay
*/

function stack($io = STDIN): void
{
    $q = trim(fgets($io));
    $stack = new SplStack();
    for ($i = 0; $i < $q; $i++) {
        $arr = explode(" ", trim(fgets($io)));
        switch ($arr[0]) {
            case '1':
                $stack->push($arr[1]);
                break;
            case '2':
                echo $stack->top() . "\n";
                break;
            case '3':
                $stack->pop();
                break;
        }
    }
}

stack();
