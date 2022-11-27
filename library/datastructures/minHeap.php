<?php

/*
Problem Sbj: A53 - Priority Queue
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_ba
*/

function priorityQueue($io = STDIN): void
{
    $q = trim(fgets($io));
    $mh = new SplMinHeap();
    for ($i = 0; $i < $q; $i++) {
        $arr = explode(" ", trim(fgets($io)));
        switch ($arr[0]) {
            case '1':
                $mh->insert($arr[1]);
                break;
            case '2':
                echo $mh->top() . "\n";
                break;
            case '3':
                $mh->extract();
                break;
        }
    }
}

priorityQueue();
