<?php
/*
 * Sum sparse table example
 * Construction complexity: O(nlogn), query comlexity: O(logn)
 */

class SumSparseTable
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
                $this->dp[$p][$i] = $leftInterval + $rightInterval;
            }
        }
    }

    // Do a sum query on the interval [l, r] in O(logn).
    // cascading sum query
    public function querySum(int $l, int $r): int
    {
        $sumVal = 0;
        for ($p = $this->log2[$r - $l + 1]; $l <= $r; $p = $this->log2[$r - $l + 1]) {
            $sumVal += $this->dp[$p][$l];
            $l += (1 << $p);
        }
        return $sumVal;
    }

    // Example usage:
    public static function main(): void
    {
        // index:  0, 1,  2, 3, 4,  5, 6
        $values = [1, 2, -3, 2, 4, -1, 5];
        $sumSparseTable = new SumSparseTable($values);

        echo $sumSparseTable->querySum(0, 6) . "\n"; // 10
        echo $sumSparseTable->querySUm(0, 3) . "\n"; // 2
        echo $sumSparseTable->querySum(4, 6) . "\n"; // 8
        echo $sumSparseTable->querySum(0, 0) . "\n"; // 1
    }
}

SumSparseTable::main();
