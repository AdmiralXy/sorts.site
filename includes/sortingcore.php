<?php

include('arraygenerator.php');

class SortingCore extends ArrayGenerator
{
    public $algorithm;
    public $datatype;
    public $generator;
    public $key;
    public $length;
    public $timer;
    public $swaps;

    public $array;
    public $steps;

    public $prearray;

    private $module;

    public function __construct($arr, $alg, $data, $gen, $keyseed, $len, $module)
    {
        $this->algorithm = $alg;
        $this->datatype = $data;
        $this->generator = $gen;
        $this->key = $keyseed;
        $this->length = $len;
        $this->module = $module;
        $this->timer = 0;
        $this->swaps = 0;
        $this->steps = array();

        if ($this->datatype != 'custom') {
            if (empty($this->key))
                $this->key = bin2hex(random_bytes(15));
            $this->array = $this->GenerateFromKey($this->key, $this->length, $this->datatype, $this->generator, $this->module);
        } else {
            $this->array = $arr;
            $this->length = count($this->array);
            $this->key = '-';
            $this->generator = '-';
            $this->datatype = '-';
        }
        if ($this->length < 206)
            $this->prearray = $this->array;
    }
}

include_once 'sortingAlgorithms/SortingAlgorithms.php';
include_once 'sortingAlgorithms/SortingAlgorithmsSteps.php';
include_once 'sortingAlgorithms/SortingAlgorithmsSwaps.php';