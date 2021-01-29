<?php

namespace App\Service;

use Symfony\Component\Config\Definition\Exception\Exception;

class MathService
{
    function sqr($x){
        return $x * $x;
    }
    function sqrt($x){
        if ($x < 0)
            throw new Exception('wrong value');
        return sqrt($x);
    }
    function del($x){
        if ($x == 0)
            throw new Exception('wrong value');
        return 1 / $x;
    }
    function neg($x){
        return -1 * $x;
    }
}