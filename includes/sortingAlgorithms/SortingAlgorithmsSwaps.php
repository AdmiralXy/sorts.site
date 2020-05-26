<?php
class SortingAlgorithmsSwaps extends SortingCore
{
    public function bubbleSort()
    {
        $this->steps = array();
        $size = count($this->array) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($this->array[$k] < $this->array[$j]) {
                    $this->swaps++;
                    list($this->array[$j], $this->array[$k]) = array($this->array[$k], $this->array[$j]);
                }   
            }
        }
    }
    public function quicksort()
    {
        $left = 0;
        $right = count($this->array) - 1;
        $this->quicksortAlg($this->array, $left, $right);
    }

    private function quicksortAlg(&$array, $left, $right)
    {
        $l = $left;
        $r = $right;
        $center = $array[(int) ($left + $right) / 2];
        do {
            while ($array[$r] > $center) {
                $r--;
            }
            while ($array[$l] < $center) {
                $l++;
            }
            if ($l <= $r) {
                list($array[$r], $array[$l]) = array($array[$l], $array[$r]);
                $this->swaps++;
                $l++;
                $r--;
            }
        } while ($l <= $r);

        if ($r > $left) $this->quicksortAlg($array, $left, $r);

        if ($l < $right) $this->quicksortAlg($array, $l, $right);
    }
    public function heapsort()
    {
        $this->heapSortAlg($this->array);
    }
    private function heapSortAlg(&$a)
    {
        $n = count($a);
        $this->heapMake($a);
        while ($n > 0) {
            list($a[0], $a[$n - 1]) = array($a[$n - 1], $a[0]);
            $this->swaps++;
            $n--;
            $this->heapify($a, 0, $n);
        }
    }

    private function heapMake(&$a)
    {
        $n = count($a);
        for ($i = ($n - 1); $i >= 0; $i--) {
            $this->heapify($a, $i, $n);
        }
    }

    private function heapify(&$a, $pos, $n)
    {
        while (2 * $pos + 1 < $n) {
            $t = 2 * $pos + 1;
            if (2 * $pos + 2 < $n && $a[2 * $pos + 2] >= $a[$t]) {
                $t = 2 * $pos + 2;
            }
            if ($a[$pos] < $a[$t]) {
                list($a[$pos], $a[$t]) = array($a[$t], $a[$pos]);
                $this->swaps++;
                $pos = $t;
            } else break;
        }
    }

    public function cocktailsort()
    {
        $n = count($this->array);
        $left = 0;
        $right = $n - 1;
        do {
            for ($i = $left; $i < $right; $i++) {
                if ($this->array[$i] > $this->array[$i + 1]) {
                    list($this->array[$i], $this->array[$i + 1]) = array($this->array[$i + 1], $this->array[$i]);
                    $this->swaps++;
                }
            }
            $right -= 1;
            for ($i = $right; $i > $left; $i--) {
                if ($this->array[$i] < $this->array[$i - 1]) {
                    list($this->array[$i], $this->array[$i - 1]) = array($this->array[$i - 1], $this->array[$i]);
                    $this->swaps++;
                }
            }
            $left += 1;
        } while ($left <= $right);
    }

    public function selectionsort()
    {
        $size = count($this->array);
        for ($i = 0; $i < $size - 1; $i++) {
            $min = $i;

            for ($j = $i + 1; $j < $size; $j++) {
                if ($this->array[$j] < $this->array[$min]) {
                    $min = $j;
                }
            }

            $temp = $this->array[$i];
            $this->array[$i] = $this->array[$min];
            $this->array[$min] = $temp;
            $this->swaps++;
        }
    }

    public function shellsort()
    {
        $inc = round(count($this->array) / 2);
        while ($inc > 0) {
            for ($i = $inc; $i < count($this->array); $i++) {
                $temp = $this->array[$i];
                $j = $i;
                while ($j >= $inc && $this->array[$j - $inc] > $temp) {
                    $this->array[$j] = $this->array[$j - $inc];
                    $this->swaps++;
                    $j -= $inc;
                }
                $this->array[$j] = $temp;
            }
            $inc = round($inc / 2.2);
        }
    }

    public function combsort()
    {
        $gap = count($this->array);
        $swap = true;
        while ($gap > 1 || $swap) {
            if ($gap > 1) $gap /= 1.25;
            $swap = false;
            $i = 0;
            while ($i + $gap < count($this->array)) {
                if ($this->array[$i] > $this->array[$i + $gap]) {
                    list($this->array[$i], $this->array[$i + $gap]) = array($this->array[$i + $gap], $this->array[$i]);
                    $this->swaps++;
                    $swap = true;
                }
                $i++;
            }
        }
    }

    public function mergesort($numlist)
    {
        if (count($numlist) == 1) return $numlist;

        $mid = count($numlist) / 2;
        $left = array_slice($numlist, 0, $mid);
        $right = array_slice($numlist, $mid);

        $left = $this->mergesort($left);
        $right = $this->mergesort($right);

        return $this->merge($left, $right);
    }

    private function merge($left, $right)
    {
        $result = array();
        $leftIndex = 0;
        $rightIndex = 0;

        while ($leftIndex < count($left) && $rightIndex < count($right)) {
            if ($left[$leftIndex] > $right[$rightIndex]) {

                $result[] = $right[$rightIndex];
                $rightIndex++;
                $this->swaps++;
            } else {
                $result[] = $left[$leftIndex];
                $leftIndex++;
                $this->swaps++;
            }
        }
        while ($leftIndex < count($left)) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
            $this->swaps++;
        }
        while ($rightIndex < count($right)) {
            $result[] = $right[$rightIndex];
            $rightIndex++;
            $this->swaps++;
        }
        return $result;
    }
}