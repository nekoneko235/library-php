<?php

/*
Problem Sbj: Adjacent Vertices
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_bi
*/

function dfs(int $pos, array $graph, array &$visited): void
{
    $visited[$pos] = true;
    for ($i = 0; $i < count($graph[$pos]); $i++) {
        $next = $graph[$pos][$i];
        if (!$visited[$next])
            dfs($next, $graph, $visited);
    }
}

function solver($io = STDIN): void
{
    [$n, $m] = explode(" ", trim(fgets($io)));
    $graph = [1 => []];
    $visited = array_fill(1, $n, false);
    for ($i = 0; $i < $m; $i++) {
        [$a, $b] = explode(" ", trim(fgets($io)));
        $graph[$a][] = $b;
        $graph[$b][] = $a;
    }

    dfs(1, $graph, $visited);

    $ans = "The graph is connected.";
    foreach ($visited as $value) {
        if ($value == false)
            $ans = "The graph is not connected.";
    }

    echo $ans;
}

solver();
