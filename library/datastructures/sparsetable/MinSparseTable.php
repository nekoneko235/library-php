<?php
/*
 * Min sparse table example
 * Construction complexity: O(nlogn), query comlexity: O(1)
 */

class MinSparseTable
{
    // The number of elements in the original input array.
    private int $n;

    // The maximum power of 2 needed. This value is floor(log2(n))
    private int $P;

    // Fast log base 2 logarithm lookup table, 1 <= i <= n
    private array $log2;

    // The sparse table values.
    private array $dp;

    // Index Table (IT) associated with the values in the sparse table. This table
    // is only useful when we want to query the index of the min (or max) element
    // int the range [l, r] rather than the value itself. The index table doesn't
    // make sense for most other range query types like gcd or sum.
    private array $it;

    public function __construct(array $values)
    {
        $this->n = count($values);
        $this->P = (int)(log($this->n) / log(2));
        $this->dp = [[]];
        $this->it = [[]];

        for ($i = 0; $i < $this->n; $i++) {
            $this->dp[0][$i] = $values[$i];
            $this->it[0][$i] = $i;
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
                $this->dp[$p][$i] = min($leftInterval, $rightInterval);

                // Propagate the index of the best value
                if ($leftInterval <= $rightInterval) {
                    $this->it[$p][$i] = $this->it[$p - 1][$i];
                } else {
                    $this->it[$p][$i] = $this->it[$p - 1][$i + (1 << ($p - 1))];
                }
            }
        }
    }

    // Do a min query on the interval [l, r] in O(1).
    //
    // We can get O(1) query by finding the smallest power of 2 that fits within
    // the interval length which we'll call k. Then we can query the intervals
    // [l, l+k] and [r-k+1, r] (which likely overlap) and apply the function
    // again. Some functions (like min and max) don't care about overlapping
    // intervals so this trick works, but for a function like sum this would
    // return the wrong result since it is not an idempotent binary function
    // (aka an overlap friendly function).
    public function queryMin(int $l, int $r): int
    {
        $length = $r - $l + 1;
        $p = $this->log2[$length];
        $k = 1 << $p; // 2 to the power of p
        return min($this->dp[$p][$l], $this->dp[$p][$r - $k + 1]);
    }

    // Returns the index of the minimum element in the range [l, r].
    public function queryMinIndex(int $l, int $r): int
    {
        $length = $r - $l + 1;
        $p = $this->log2[$length];
        $k = 1 << $p; // 2 to the power of p
        $leftInterval = $this->dp[$p][$l];
        $rightInterval = $this->dp[$p][$r - $k + 1];
        if ($leftInterval <= $rightInterval) {
            return $this->it[$p][$l];
        } else {
            return $this->it[$p][$r - $k + 1];
        }
    }

    // Example usage:
    public static function main(): void
    {
        // index:  0, 1,  2, 3, 4,  5, 6
        $values = [1, 2, -3, 2, 4, -1, 5];
        $minSparseTable = new MinSparseTable($values);

        echo $minSparseTable->queryMin(1, 5) . "\n"; // -3
        echo $minSparseTable->queryMinIndex(1, 5) . "\n"; // 2

        echo $minSparseTable->queryMin(3, 3) . "\n"; // 2
        echo $minSparseTable->queryMinIndex(3, 3) . "\n"; // 3

        echo $minSparseTable->queryMin(3, 6) . "\n"; // -1
        echo $minSparseTable->queryMinIndex(3, 6) . "\n"; // 5
    }
}

MinSparseTable::main();
