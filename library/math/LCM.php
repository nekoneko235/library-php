<?php

declare(strict_types=1);

namespace library\math;

require_once 'GCD.php';

use function library\math\gcd;

/*
 * An implementation of finding the LCM of two numbers
 * Time Complexity ~O(log(a + b))
 */

function lcm(int $a, int $b): int
{
    $lcm = $a / gcd($a, $b) * $b;
    return $lcm > 0 ? $lcm : -$lcm;
}

print_r(lcm(12, 4));
/*
12
*/
