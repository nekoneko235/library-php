<?php

/**
 * Find a next array permutation
 *
 * @param array $input
 * @return boolean
 */
function nextPermutation(array &$input): bool
{
    $inputCount = count($input);

    // the head of the suffix
    $i = $inputCount - 1;

    // find longest suffix
    while ($i > 0 && $input[$i] <= $input[$i - 1]) {
        $i--;
    }

    //are we at the last permutation already?
    if ($i <= 0) {
        return false;
    }

    // get the pivot
    $pivotIndex = $i - 1;

    // find rightmost element that exceeds the pivot
    $j = $inputCount - 1;
    while ($input[$j] <= $input[$pivotIndex]) {
        $j--;
    }

    // swap the pivot with j
    $temp = $input[$pivotIndex];
    $input[$pivotIndex] = $input[$j];
    $input[$j] = $temp;

    // reverse the suffix
    $j = $inputCount - 1;

    while ($i < $j) {
        $temp = $input[$i];
        $input[$i] = $input[$j];
        $input[$j] = $temp;

        $i++;
        $j--;
    }

    return true;
}
