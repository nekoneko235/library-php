<?php
/*
 * An implementation of finding the GCD of two numbers
 * Time Complexity ~O(log(a + b))
 */

function gcd($a, $b)
{
    return $b === 0 ? ($a < 0 ? -$a : $a) : gcd($b, $a % $b);
}
