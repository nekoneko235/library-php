<?php

declare(strict_types=1);

namespace library\math;

/*
 * Tests whether a number is a prime number or not
 * Time Complexity: O(sqrt(n))
 */

function isPrime(int $n): bool
{
    if ($n === 1) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
}

print_r(isPrime(17));
/*
1
*/
