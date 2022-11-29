<?php

/*
Problem Sbj: A61 - Adjacent Vertices
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_bi
*/

function AdjacencyList($io = STDIN): void
{
    list($n, $m) = explode(" ", trim(fgets($io)));
    $graph = [1 => []];
    for ($i = 0; $i < $m; $i++) {
        list($a, $b) = explode(" ", trim(fgets($io)));
        $graph[$a][] = $b;
        $graph[$b][] = $a;
    }
    for ($i = 1; $i <= $n; $i++) {
        echo $i . ": {";
        foreach ($graph[$i] as $key => $value) {
            echo $value;
            if ($key != count($graph[$i]) - 1) {
                echo ", ";
            }
        }
        echo "}\n";
    }
}

AdjacencyList();

/*
[
    '1' => ['1' => 2],
    '2' => ['1' => 1, '2' => 3],
    '3' => ['1' => 2, '2' => 4, '3' => 5],
    '4' => ['1' => 3],
    '5' => ['1' => 3],
]
*/
