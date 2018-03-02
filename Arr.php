<?php
/**
 * Created by PhpStorm.
 * User: tarran
 * Date: 03/03/2017
 * Time: 12:32
 */

namespace TarranJones\Support;

use Illuminate\Support\Arr as IlluminateArr;

class Arr extends IlluminateArr
{

    public static function __callStatic($name, $arguments){

        if(function_exists('array_' . $name)){
            return call_user_func_array('array_' . $name, $arguments);
        }
    }
}