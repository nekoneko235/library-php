<?php

/*
Problem Sbj: A66 - Connect Query
Problem URL: https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_bn
*/

class UnionFind
{
    // The number of elements in this union find
    private int $size;

    // Used to track the size of each of the component
    private array $sz;

    // id[i] points to the parent of i, if id[i] = i then i is a root node
    private array $id;

    // Tracks the number of components in the union find
    private int $numComponents;

    public function __construct(int $size)
    {
        if ($size <= 0)
            throw new InvalidArgumentException("Size <= 0 is not allowed");

        $this->size = $this->numComponents = $size;
        $this->sz = [];
        $this->id = [];

        for ($i = 1; $i <= $this->size; $i++) {
            $this->id[$i] = $i; // Link to itself (self root)
            $this->sz[$i] = 1;  // Each component is originally of size one
        }
    }

    // Find which component/set 'p' belongs to, takes amortized constant time
    public function find(int $p): int
    {
        // Find the root of the component/set
        $root = $p;
        while ($root != $this->id[$root])
            $root = $this->id[$root];

        // Compress the path leading back to the root
        // Doing this operation is called "path compression"
        // and is what gives us amortized time complexity
        while ($p != $root) {
            $next = $this->id[$p];
            $this->id[$p] = $root;
            $p = $next;
        }

        return $root;
    }

    // Unify the components/sets containing elements 'p' and 'q'
    public function unify(int $p, int $q): void
    {
        // These elements are already in the same group!
        if ($this->connected($p, $q))
            return;

        $root1 = $this->find($p);
        $root2 = $this->find($q);

        // Merge smaller component/set into the larger one
        if ($this->sz[$root1] < $this->sz[$root2]) {
            $this->sz[$root2] += $this->sz[$root1];
            $this->id[$root1] = $root2;
        } else {
            $this->sz[$root1] += $this->sz[$root2];
            $this->id[$root2] = $root1;
        }

        // Since the roots found are different we know that the
        // number of components/sets has decreased by one
        $this->numComponents--;
    }

    // Return whether or not the elements 'p' and
    // 'q' are in the same components/set
    public function connected(int $p, int $q): bool
    {
        return $this->find($p) == $this->find($q);
    }

    // Return the size of the components/set 'p' belongs to
    public function componentSize(int $p): int
    {
        return $this->sz[$this->find($p)];
    }

    // Return the number of elements in this UnionFind/Disjoint set
    public function size(): int
    {
        return $this->size;
    }

    // Returns the number of remaining components/sets
    public function components(): int
    {
        return $this->numComponents;
    }
}

function solver($io = STDIN)
{
    [$n, $q] = explode(" ", trim(fgets($io)));
    $uf = new UnionFind($n);
    for ($i = 0; $i < $q; $i++) {
        $arr = explode(" ", trim(fgets($io)));
        if ($arr[0] == 1) {
            $uf->unify($arr[1], $arr[2]);
        } else {
            if ($uf->connected($arr[1], $arr[2])) {
                echo "Yes\n";
            } else {
                echo "No\n";
            }
        }
    }
}

solver();
