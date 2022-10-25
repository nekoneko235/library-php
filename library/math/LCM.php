<?php
/*
 * An implementation of finding the LCM of two numbers
 * Time Complexity ~O(log(a + b))
 */

function gcd($a, $b)
{
    return $b === 0 ? ($a < 0 ? -$a : $a) : gcd($b, $a % $b);
}

function lcm($a, $b)
{
    $lcm = $a / gcd($a, $b) * $b;
    return $lcm > 0 ? $lcm : -$lcm;
}
