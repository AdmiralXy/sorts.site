<?php
class ArrayGenerator
{
    public function GenerateFromKey($key, $length, $type, $generator, $module)
    {
        $seed = crc32($key);
        srand($seed);
        $array = array();

        switch ($generator) {
            case 'random':
                foreach (range(1, $length) as $i) {
                    if ($type == 'ints')
                        $array[] = rand(0, $module);
                    else if ($type == 'floats')
                        $array[] = round(rand(0, $module) / rand(1, 100), 10);
                    else if ($type == 'strings') {
                        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < rand(2, 7); $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        $array[] = $randomString;
                    } else if ($type == 'dates') {
                        $timestamp = rand(1, time());
                        $array[] = date("Y-m-d", $timestamp);
                    }
                }
                break;
            case 'halfsorted':
                $counter = $length / $module;

                if ($type == 'ints')
                    $num = 1;
                else if ($type == 'floats')
                    $num = 0.001;
                else if ($type == 'strings')
                    $num = 'aaaa';
                else if ($type == 'dates')
                    $num = date("d-m-Y", rand(1, time()));

                $temp = 1;

                for ($i = 0; $i < $length; $i++) {
                    $end = rand($i, $counter * $temp);
                    if ($end > $length)
                        $end = $length - 1;
                    for ($j = $i; $j < $end + 1; $j++)
                        $array[$j] = $num;
                    $num++;
                    $temp++;
                    $i = $end;
                }

                for ($i = 1; $i < $length; $i *= 10)
                    if ($i * 10 < $length + 1)
                        list($array[$i - 1], $array[$i * 10 - 1]) = array($array[$i * 10 - 1], $array[$i - 1]);
                break;
            case 'halfsame':
                foreach (range(1, $length) as $i) {
                    if ($type == 'ints')
                        $array[] = rand(0, $module);
                    else if ($type == 'floats')
                        $array[] = round(rand(0, $module) / rand(1, 100), 10);
                    else if ($type == 'strings') {
                        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < rand(2, 7); $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        $array[] = $randomString;
                    } else if ($type == 'dates') {
                        $timestamp = rand(1, time());
                        $array[] = date("Y-m-d", $timestamp);
                    }
                }

                $selector = array_rand($array, ($length / 100) * 75);
                if ($type == 'ints')
                    $number = rand(0, $module);
                else if ($type == 'floats')
                    $number = round(rand(0, $module) / rand(1, 100), 10);
                else if ($type == 'strings') {
                    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < rand(2, 7); $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $number = $randomString;
                } else if ($type == 'dates') {
                    $timestamp = rand(1, time());
                    $number = date("Y-m-d", $timestamp);
                }

                for ($i = 0; $i < count($selector); $i++)
                    $array[$selector[$i]] = $number;
                break;
        }
        return $array;
    }
}
