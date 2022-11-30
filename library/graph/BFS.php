<?php

/*
Problem Sbj: A63 - Shortest Path 1
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/math_and_algorithm_an
*/

function solver($io = STDIN)
{
    [$n, $m] = explode(" ", trim(fgets($io)));
    $graph = [1 => []];
    $dist =  array_fill(1, $n, -1);
    $queue = new SplQueue();;
    $queue->push(1);
    $dist[1] = 0;
    for ($i = 1; $i <= $m; $i++) {
        [$a, $b] = explode(" ", trim(fgets($io)));
        $graph[$a][] = $b;
        $graph[$b][] = $a;
    }

    // BFS
    while (!$queue->isEmpty()) {
        $pos = $queue->shift();
        for ($i = 0; $i < count($graph[$pos]); $i++) {
            $to = $graph[$pos][$i];
            if ($dist[$to] == -1) {
                $dist[$to] = $dist[$pos] + 1;
                $queue->push($to);
            }
        }
    }

    foreach ($dist as $value) {
        echo $value . "\n";
    }
}

solver();
