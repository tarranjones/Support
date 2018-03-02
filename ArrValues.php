<?php
/**
 * Created by PhpStorm.
 * User: tarran
 * Date: 03/03/2017
 * Time: 12:33
 */

namespace TarranJones\Support;

use TarranJones\Support\Str;
use TarranJones\Support\StrAffix;
use Illuminate\Support\Arr as IlluminateArr;


class ArrValues extends IlluminateArr
{
    public static function __callStatic($name, $arguments){

        if (Str::endsWith($name,'fix')) {
            array_splice($arguments, 2, 0, $name);
            return call_user_func_array('static::affix', $arguments);
        }
        if(method_exists(ArrKeys::class, $name)){

            foreach ($arguments as $array){

            }
            $values = array_splice($arguments, 1, 1, array(array_keys($arguments[1])))[0];
            return array_combine(call_user_func_array('ArrKeys::' . $name, $arguments), $values);
        }
    }

    public static function affix($affix, Array $array, $type = 'prefix', $phonemes = null){
        return array_map(function($value) use ($type, $affix, $phonemes) {
            return call_user_func(array('Str_Affix', $type), $value, $affix, $phonemes);
        }, $array);
    }

    public static function array_blacklist(Array $array1, Array $array2) {
        if(func_num_args() > 2){
            $args = func_get_args();
            return call_user_func_array('array_diff', $args);
        } else {
            return array_diff($array1, $array2);
        }
    }

    public static function array_whitelist(Array $array1, Array $array2) {
        if(func_num_args() > 2){
            $args = func_get_args();
            array_shift($args);
            $array2 = call_user_func_array('array_merge', $args);
        }
        return array_intersect($array1, $array2);
    }

    /*
    Aliases
    */





}