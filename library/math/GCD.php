<?php

namespace library\math;

/*
 * An implementation of finding the GCD of two numbers
 * Time Complexity ~O(log(a + b))
 */

function gcd(int $a, int $b): int
{
    return $b === 0 ? ($a < 0 ? -$a : $a) : gcd($b, $a % $b);
}

print_r(gcd(24, 16));
/*
8
*/
