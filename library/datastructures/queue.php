<?php

/*
Problem Sbj: A52 - Queue
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_az
*/

function queue($io = STDIN): void
{
    $q = trim(fgets($io));
    $queue = [];
    for ($i = 0; $i < $q; $i++) {
        $arr = explode(" ", trim(fgets($io)));
        switch ($arr[0]) {
            case '1':
                array_push($queue, $arr[1]);
                break;
            case '2':
                echo $queue[0] . "\n";
                break;
            case '3':
                array_shift($queue);
                break;
        }
    }
}

queue();
