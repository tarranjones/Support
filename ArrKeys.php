<?php
/**
 * Created by PhpStorm.
 * User: tarran
 * Date: 03/03/2017
 * Time: 12:34
 */

namespace TarranJones\Support;

use TarranJones\Support\ArrValues;

/**
 * Class ArrKeys
 * @package TarranJones\Support
 */
class ArrKeys
{
    /**
     * @param $name
     * @param $arguments
     * @return array
     */
    public static function __callStatic($name, $arguments){

        if(method_exists('ArrValues',  $name)){
            $values = array_splice($arguments, 1, 1, array(array_keys($arguments[1])))[0];
            return array_combine(call_user_func_array('ArrValues::' . $name, $arguments), $values);
        }
    }

    /**
     * @param $needle
     * @param array $haystack
     * @return bool
     */
    public static function exist($needle, Array $haystack){
        return array_key_exists($needle, $haystack);
    }

    /**
     * @param array $array1
     * @param array $array2
     * @return array
     */
    public static function array_blacklist(Array $array1, Array $array2) {
        if(func_num_args() > 2){
            $args = func_get_args();
            array_shift($args);
            $array2 = call_user_func_array('array_merge', $args);
        }
        return array_diff_key($array1, array_flip($array2));
    }

    /**
     * @param array $array1
     * @param array $array2
     * @return array
     */
    public static function array_whitelist(Array $array1, Array $array2) {
        if(func_num_args() > 2){
            $args = func_get_args();
            array_shift($args);
            $array2 = call_user_func_array('array_merge', $args);
        }
        return array_intersect_key($array1, array_flip($array2));
    }

    function reverse($array){
        return array_reverse(array_reverse($array,true),false);
    }

}