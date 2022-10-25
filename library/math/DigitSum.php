<?php
/*
 * Find the sum of the digits of a number
 * Time Complexity: O(n)
 */

function digitSum($n)
{
    $sum = 0;
    while ($n > 0) {
        $sum += $n % 10;
        $n = intdiv($n, 10);
    }
    return $sum;
}
