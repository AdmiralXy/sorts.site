<?php

if (empty($_GET['algorithm']) or empty($_GET['datatype']) or empty($_GET['generator']) or empty($_GET['return']) or empty($_GET['length']) or empty($_GET['repeatedly']) or empty($_GET['module'])) {
    echo ('error_empty');
    exit();
}

include('sortingcore.php');

$iterationsN = $_GET['repeatedly'];

$iterationsTimer = array();
$iterationsSwaps = array();
$iterationsMemory = array();

for ($i = 0; $i < $iterationsN; $i++)
{
    $obj = 0;
    if ($_GET['return'] == 'swaps')
        $obj = new SortingAlgorithmsSwaps($array, $_GET['algorithm'], $_GET['datatype'], $_GET['generator'], $_GET['key'], $_GET['length'], $_GET['module']);
    else
        $obj = new SortingAlgorithms($array, $_GET['algorithm'], $_GET['datatype'], $_GET['generator'], $_GET['key'], $_GET['length'], $_GET['module']);
    if ($_GET['algorithm'] == 'radixsort' && ($_GET['datatype'] == 'floats' or $_GET['datatype'] == 'strings' or $_GET['datatype'] == 'dates')) {
        for ($i = 0; $i < count($obj->array); $i++)
            $obj->array[$i] = base_convert($obj->array[$i], 16, 10);
    }
    $start = microtime(true);
    switch ($_GET['algorithm']) {
        case 'bubblesort':
            $obj->bubblesort();
            break;
        case 'cocktailsort':
            $obj->cocktailsort();
            break;
        case 'selectionsort':
            $obj->selectionsort();
            break;
        case 'shellsort':
            $obj->shellsort();
            break;
        case 'combsort':
            $obj->combsort();
            break;
        case 'quicksort':
            $obj->quicksort();
            break;
        case 'mergesort':
            $obj->array = $obj->mergesort($obj->array);
            break;
        case 'heapsort':
            $obj->heapsort();
            break;
        case 'radixsort':
            $obj->radixSort();
            break;
        case 'phpsort':
            sort($obj->array);
            break;
        case 'mergesortIterative':
            $obj->mergesortIterative();
            break;
        case 'quicksortIterative':
            $obj->quicksortIterative();
            break;
        case 'introsort':
            $obj->IntroSort();
            break;
    }
    array_push($iterationsTimer, round(microtime(true) - $start, 4) * 1000);
    array_push($iterationsSwaps, $obj->swaps);
    array_push($iterationsMemory, round(memory_get_peak_usage() / 1024));
}

$totalTimer = 0;
$totalSwaps = 0;
$totalMemory = 0;

for ($i = 0; $i < $iterationsN; $i++)
{
    $totalTimer += $iterationsTimer[$i];
    $totalSwaps += $iterationsSwaps[$i];
    $totalMemory += $iterationsMemory[$i];
}

$totalTimer /= $iterationsN;
$totalSwaps /= $iterationsN;
$totalMemory /= $iterationsN;

echo 'success ';
echo $obj->algorithm . ' ';
echo $obj->length . ' ';
echo $iterationsN . ' ';
switch ($_GET['return']) {
    case 'timer':
        for ($i = 0; $i < $iterationsN; $i++)
            echo $iterationsTimer[$i] . ' ';
        break;
    case 'swaps':
        for ($i = 0; $i < $iterationsN; $i++)
            echo $iterationsSwaps[$i] . ' ';
        break;
    case 'memory':
        for ($i = 0; $i < $iterationsN; $i++)
            echo $iterationsMemory[$i] . ' ';
        break;
}