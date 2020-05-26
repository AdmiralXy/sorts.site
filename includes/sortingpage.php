<?php

$array = explode(' ', $_POST['array']);

if (empty($_POST['algorithm'])) {
    echo ('error_algorithm');
    exit();
}
else if (empty($_POST['datatype'])) {
    echo ('error_datatype');
    exit();
}
else if ($_POST['datatype'] == 'custom' && count($array) < 2) {
    echo ('error_customempty');
    exit();
} 
else if ($_POST['datatype'] != 'custom' && empty($_POST['length'])) {
    echo ('error_length');
    exit();
} 
else if ($_POST['datatype'] != 'custom' && empty($_POST['generator'])) {
    echo ('error_generator');
    exit();
}

include('sortingcore.php');

if ($_POST['length'] < 206)
    $obj = new SortingAlgorithmsSteps($array, $_POST['algorithm'], $_POST['datatype'], $_POST['generator'], $_POST['key'], $_POST['length'], 1000);
else
    $obj = new SortingAlgorithms($array, $_POST['algorithm'], $_POST['datatype'], $_POST['generator'], $_POST['key'], $_POST['length'], 1000);

switch ($_POST['datatype']) {
    case 'custom':
        $obj->datatype = 'пользовательский';
        break;
    case 'ints':
        $obj->datatype = 'Целые-числа';
        break;
    case 'floats':
        $obj->datatype = 'Числа-с-плавающей-запятой';
        break;
    case 'strings':
        $obj->datatype = 'Строки';
        break;
    case 'dates':
        $obj->datatype = 'Даты';
        break;
}

switch ($_POST['generator']) {
    case 'random':
        $obj->generator = 'Случайная';
        break;
    case 'halfsorted':
        $obj->generator = 'Частично-упорядоченная';
        break;
    case 'halfsame':
        $obj->generator = 'Частично-одинаковая';
        break;
}

$start = microtime(true);
if ($_POST['algorithm'] == 'radixsort' && ($_POST['datatype'] == 'floats' or $_POST['datatype'] == 'custom' or $_POST['datatype'] == 'strings' or $_POST['datatype'] == 'dates')) {
    for ($i = 0; $i < count($obj->array); $i++)
        $obj->array[$i] = base_convert($obj->array[$i], 16, 10);
}

switch ($_POST['algorithm']) {
    case 'bubblesort':
        $obj->bubblesort();
        $obj->algorithm = 'Сортировка-пузырьком';
        break;
    case 'cocktailsort':
        $obj->cocktailsort();
        $obj->algorithm = 'Шейкерная-сортировка';
        break;
    case 'selectionsort':
        $obj->selectionsort();
        $obj->algorithm = 'Сортировка-выбором';
        break;
    case 'shellsort':
        $obj->shellsort();
        $obj->algorithm = 'Сортировка-Шелла';
        break;
    case 'combsort':
        $obj->combsort();
        $obj->algorithm = 'Сортировка-расчесткой';
        break;
    case 'quicksort':
        $obj->quicksort();
        $obj->algorithm = 'Быстрая-сортировка';
        break;
    case 'mergesort':
        $obj->array = $obj->mergesort($obj->array);
        $obj->algorithm = 'Сортировка-слиянием';
        break;
    case 'heapsort':
        $obj->heapsort();
        $obj->algorithm = 'Сортировка-кучей';
        break;
    case 'radixsort':
        $obj->radixSort();
        $obj->algorithm = 'Поразрядная-сортировка';
        break;
    case 'phpsort':
        sort($obj->array);
        $obj->algorithm = 'Встроенная-сортировка';
        break;
}
$obj->timer = round(microtime(true) - $start, 4) * 1000;

echo 'success ';
echo $obj->algorithm . ' ';
echo $obj->datatype . ' ';
echo $obj->generator . ' ';
echo $obj->key . ' ';
echo $obj->length . ' ';
echo $obj->timer . ' ';
echo $obj->swaps . ' ';

if (count($obj->array) < 206) {

    $array = $obj->prearray;
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

    for ($i = 0; $i < count($positions); $i++)
        echo $positions[$i] . ' ';

    foreach ($obj->steps as $i) {
        echo $i . ' ';
    }
}

