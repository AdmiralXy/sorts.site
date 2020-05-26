<?php

class SortingAlgorithmsSteps extends SortingCore
{
    public function bubblesort()
    {
        $this->steps = array();
        $size = count($this->array) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($this->array[$k] < $this->array[$j]) {
                    array_push($this->steps, $j);
                    array_push($this->steps, $k);
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
                array_push($this->steps, $r);
                array_push($this->steps, $l);
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
            array_push($this->steps, 0);
            array_push($this->steps, $n - 1);
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
                array_push($this->steps, $pos);
                array_push($this->steps, $t);
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
                    array_push($this->steps, $i);
                    array_push($this->steps, $i + 1);
                    list($this->array[$i], $this->array[$i + 1]) = array($this->array[$i + 1], $this->array[$i]);
                }
            }
            $right -= 1;
            for ($i = $right; $i > $left; $i--) {
                if ($this->array[$i] < $this->array[$i - 1]) {
                    array_push($this->steps, $i);
                    array_push($this->steps, $i - 1);
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

            array_push($this->steps, $i);
            array_push($this->steps, $min);
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
                    array_push($this->steps, $j);
                    array_push($this->steps, $j - $inc);
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
                    array_push($this->steps, floor($i));
                    array_push($this->steps, floor($i + $gap));
                    $swap = true;
                }
                $i++;
            }
        }
    }

    public function mergesort($numlist)
    {
        if (count($numlist) == 1) {
            
            return $numlist;
        }
        
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
        if (count($result) % count($this->array) == 0) {
            $array = $result;
            $positions = array();
            $n = count($array);
            $t = 0;
            while (count($array)) {
                $max = array_keys($array, max($array));
                foreach ($max as $key => $value) {
                    $positions[$value] = $n;
                    unset($array[$value]);
                    $array = $array;
                    $t++;
                }
                $n -= $t;
                $t = 0;
            }

            for ($p = 0; $p < count($positions); $p++)
                array_push($this->steps, $positions[$p]);
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

            if (count($this->array) % $this->length == 0) {
                $array = $this->array;
                $positions = array();
                $n = count($array);
                $t = 0;
                while (count($array)) {
                    $max = array_keys($array, max($array));
                    foreach ($max as $key => $value) {
                        $positions[$value] = $n;
                        unset($array[$value]);
                        $t++;
                    }
                    $n -= $t;
                    $t = 0;
                }

                for ($p = 0; $p < count($positions); $p++)
                    array_push($this->steps, $positions[$p]);
            }
            //Reset bucket
            $bucket = array_fill(0, 9, array());
            $nextSigFig = true;
        }
    }
}
