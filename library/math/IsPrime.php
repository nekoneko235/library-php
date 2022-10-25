<?php
/*
 * Tests whether a number is a prime number or not
 * Time Complexity: O(sqrt(n))
 */

function isPrime($n)
{
    if ($n === 1) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
}
