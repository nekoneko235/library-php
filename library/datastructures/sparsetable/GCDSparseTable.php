<?php
/*
 * GCD sparse table example
 * Construction complexity: O(nlogn), query comlexity: O(1)
 */

class GCDSparseTable
{
    // The number of elements in the original input array.
    private int $n;

    // The maximum power of 2 needed. This value is floor(log2(n))
    private int $P;

    // Fast log base 2 logarithm lookup table, 1 <= i <= n
    private array $log2;

    // The sparse table values.
    private array $dp;

    public function __construct(array $values)
    {
        $this->n = count($values);
        $this->P = (int)(log($this->n) / log(2));
        $this->dp = [[]];

        for ($i = 0; $i < $this->n; $i++) {
            $this->dp[0][$i] = $values[$i];
        }

        $this->log2 = array_fill(0, $this->n + 1, 0);
        for ($i = 2; $i <= $this->n; $i++) {
            $this->log2[$i] = $this->log2[intdiv($i, 2)] + 1;
        }

        // Build sparse table combining the values of the previous intervals.
        for ($p = 1; $p <= $this->P; $p++) {
            for ($i = 0; $i + (1 << $p) <= $this->n; $i++) {
                $leftInterval  = $this->dp[$p - 1][$i];
                $rightInterval = $this->dp[$p - 1][$i + (1 << ($p - 1))];
                $this->dp[$p][$i] = $this->gcd($leftInterval, $rightInterval);
            }
        }
    }

    // Do a gcd query on the interval [l, r] in O(1).
    //
    // We can get O(1) query by finding the smallest power of 2 that fits within
    // the interval length which we'll call k. Then we can query the intervals
    // [l, l+k] and [r-k+1, r] (which likely overlap) and apply the function
    // again. Some functions (like min and max) don't care about overlapping
    // intervals so this trick works, but for a function like sum this would
    // return the wrong result since it is not an idempotent binary function
    // (aka an overlap friendly function).
    public function queryGCD(int $l, int $r): int
    {
        $length = $r - $l + 1;
        $p = $this->log2[$length];
        $k = 1 << $p; // 2 to the power of p
        return $this->gcd($this->dp[$p][$l], $this->dp[$p][$r - $k + 1]);
    }

    private function gcd(int $a, int $b): int
    {
        return $b === 0 ? ($a < 0 ? -$a : $a) : $this->gcd($b, $a % $b);
    }

    // Example usage:
    public static function main(): void
    {
        // index:   0,  1,  2,  3, 4,  5,  6,  7,  8,  9
        $values = [18, 44, 86, 66, 6, 51, 55, 60, 64, 30];
        $gcdSparseTable = new GCDSparseTable($values);

        echo $gcdSparseTable->queryGCD(0, 9) . "\n"; // 1
        echo $gcdSparseTable->queryGCD(0, 4) . "\n"; // 2
        echo $gcdSparseTable->queryGCD(3, 7) . "\n"; // 1
        echo $gcdSparseTable->queryGCD(3, 4) . "\n"; // 6
        echo $gcdSparseTable->queryGCD(6, 7) . "\n"; // 5
        echo $gcdSparseTable->queryGCD(5, 5) . "\n"; // 51
    }
}

GCDSparseTable::main();
