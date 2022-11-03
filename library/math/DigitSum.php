<?php
/*
 * Find the sum of the digits of a number
 * Time Complexity: O(1)
 */

function digitSum($n): int
{
    $sum = 0;
    while ($n > 0) {
        $sum += $n % 10;
        $n = intdiv($n, 10);
    }
    return $sum;
}

print_r(digitSum(123456));
/*
21
*/
