<?php

class SortingAlgorithms extends SortingCore
{
    public function bubbleSort()
    {
        $this->steps = array();
        $size = count($this->array) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($this->array[$k] < $this->array[$j])
                    list($this->array[$j], $this->array[$k]) = array($this->array[$k], $this->array[$j]);
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
                }
            }
            $right -= 1;
            for ($i = $right; $i > $left; $i--) {
                if ($this->array[$i] < $this->array[$i - 1]) {
                    list($this->array[$i], $this->array[$i - 1]) = array($this->array[$i - 1], $this->array[$i]);
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
            } else {
                $result[] = $left[$leftIndex];
                $leftIndex++;
            }
        }
        while ($leftIndex < count($left)) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        }
        while ($rightIndex < count($right)) {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
        return $result;
    }

    public function radixSort()
    {
        //Create a bucket of arrays
        $bucket = array_fill(0, 9, array());
        $maxDigits = 0;
        //Determine the maximum number of digits in the given array.
        foreach ($this->array as $value) {
            $numDigits = strlen((string) $value);
            if ($numDigits > $maxDigits)
                $maxDigits = $numDigits;
        }
        $nextSigFig = false;
        for ($k = 0; $k < $maxDigits; $k++) {
            for ($i = 0; $i < count($this->array); $i++) {
                if (!$nextSigFig)
                    $bucket[$this->array[$i] % 10][] =  $this->array[$i];
                else
                    $bucket[floor(($this->array[$i] / pow(10, $k))) % 10][] =  $this->array[$i];
            }
            //Reset array and load back values from bucket.
            $this->array = array();
            for ($j = 0; $j < count($bucket); $j++) {
                foreach ($bucket[$j] as $value) {
                    $this->array[] = $value;
                }
            }
            //Reset bucket
            $bucket = array_fill(0, 9, array());
            $nextSigFig = true;
        }
    }

    public function MergeIterative(&$data, $left, $mid, $right)
    {
        $n1 = $mid - $left + 1;
        $n2 = $right - $mid;

        for ($i = 0; $i < $n1; $i++)
            $L[$i] = $data[$left + $i];

        for ($j = 0; $j < $n2; $j++)
            $R[$j] = $data[$mid + 1 + $j];

        $i = 0;
        $j = 0;
        $k = $left;

        while ($i < $n1 && $j < $n2) {
            if ($L[$i] <= $R[$j]) {
                $data[$k] = $L[$i];
                $i++;
            } else {
                $data[$k] = $R[$j];
                $j++;
            }

            $k++;
        }

        while ($i < $n1) {
            $data[$k] = $L[$i];
            $i++;
            $k++;
        }

        while ($j < $n2) {
            $data[$k] = $R[$j];
            $j++;
            $k++;
        }

        $L = null;
        $R = null;
    }

    public function mergesortIterative()
    {
        $count = count($this->array);
        for ($currentSize = 1; $currentSize <= $count - 1; $currentSize = 2 * $currentSize) {
            for ($leftStart = 0; $leftStart < $count - 1; $leftStart += 2 * $currentSize) {
                $mid = $leftStart + $currentSize - 1;
                $rightEnd = min($leftStart + 2 * $currentSize - 1, $count - 1);

                $this->MergeIterative($this->array, $leftStart, $mid, $rightEnd);
            }
        }
        for ($i = count($this->array); $i > $count - 1; $i--)
            unset($this->array[$i]);
    }

    public function quicksortIterative()
    {
        $cur = 1;
        $stack[1]['l'] = 0;
        $stack[1]['r'] = count($this->array) - 1;

        do {
            $l = $stack[$cur]['l'];
            $r = $stack[$cur]['r'];
            $cur--;

            do {
                $i = $l;
                $j = $r;
                $tmp = $this->array[(int) (($l + $r) / 2)];
                do {
                    while ($this->array[$i] < $tmp)
                        $i++;

                    while ($tmp < $this->array[$j])
                        $j--;

                    if ($i <= $j) {
                        $w = $this->array[$i];
                        $this->array[$i] = $this->array[$j];
                        $this->array[$j] = $w;

                        $i++;
                        $j--;
                    }
                } while ($i <= $j);


                if ($i < $r) {
                    $cur++;
                    $stack[$cur]['l'] = $i;
                    $stack[$cur]['r'] = $r;
                }
                $r = $j;
            } while ($l < $r);
        } while ($cur != 0);
    }

    public function InsertionSortINT(&$data, $count)
    {
        for ($i = 1; $i < $count; $i++) {
            $j = $i;

            while ($j > 0) {
                if ($data[$j - 1] > $data[$j]) {
                    $data[$j - 1] ^= $data[$j];
                    $data[$j] ^= $data[$j - 1];
                    $data[$j - 1] ^= $data[$j];

                    $j--;
                } else {
                    break;
                }
            }
        }
    }

    public function MaxHeapify(&$data, $heapSize, $index)
    {
        $left = ($index + 1) * 2 - 1;
        $right = ($index + 1) * 2;
        $largest = 0;

        if ($left < $heapSize && $data[$left] > $data[$index])
            $largest = $left;
        else
            $largest = $index;

        if ($right < $heapSize && $data[$right] > $data[$largest])
            $largest = $right;

        if ($largest != $index) {
            $temp = $data[$index];
            $data[$index] = $data[$largest];
            $data[$largest] = $temp;

            $this->MaxHeapify($data, $heapSize, $largest);
        }
    }

    public function HeapSortINT(&$data, $count)
    {
        $heapSize = $count;

        for ($p = ($heapSize - 1) / 2; $p >= 0; $p--)
            $this->MaxHeapify($data, $heapSize, $p);

        for ($i = $count - 1; $i > 0; $i--) {
            $temp = $data[$i];
            $data[$i] = $data[0];
            $data[0] = $temp;

            $heapSize--;
            $this->MaxHeapify($data, $heapSize, 0);
        }
    }

    public function Partition(&$data, $left, $right)
    {
        $pivot = $data[$right];
        $i = $left;

        for ($j = $left; $j < $right; $j++) {
            if ($data[$j] <= $pivot) {
                $temp = $data[$j];
                $data[$j] = $data[$i];
                $data[$i] = $temp;
                $i++;
            }
        }

        $data[$right] = $data[$i];
        $data[$i] = $pivot;

        return $i;
    }

    public function QuickSortRecursive(&$data, $left, $right)
    {
        if ($left < $right) {
            $q = $this->Partition($data, $left, $right);
            $this->QuickSortRecursive($data, $left, $q - 1);
            $this->QuickSortRecursive($data, $q + 1, $right);
        }
    }

    public function IntroSort()
    {
        $count = count($this->array);
        $partitionSize = $this->Partition($this->array, 0, $count - 1);

        if ($partitionSize < 16) {
            $this->InsertionSortINT($this->array, $count);
        } else if ($partitionSize > (2 * log($count))) {
            $this->HeapSortINT($this->array, $count);
        } else {
            $this->QuickSortRecursive($this->array, 0, $count - 1);
        }
    }
}
