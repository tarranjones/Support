<?php
/**
 * Created by PhpStorm.
 * User: tarran
 * Date: 03/03/2017
 * Time: 12:35
 */

namespace TarranJones\Support;


/**
 * Class ArrRecursive
 * @package TarranJones\Support
 */

use RecursiveIteratorIterator;
use RecursiveArrayIterator;
use TarranJones\Support\Arr;


/**
 * Class ArrRecursive
 * @package TarranJones\Support
 */
class ArrRecursive
{

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {

        if(function_exists('array_' . $name . '_recursive')){
            return call_user_func_array('array_' . $name . '_recursive', $arguments);
        }
    }

    /**
     * @param array ...$arrays
     * @return mixed
     */
    public static function merge(...$arrays)
    {
        return call_user_func_array('array_merge_recursive', $arrays);
    }

    /**
     * @param array ...$arrays
     * @return mixed
     */
    public static function replace(...$arrays)
    {
        return call_user_func_array('array_replace_recursive', $arrays);
    }

    /**
     * @param array $array
     * @param callable $callback
     * @param mixed|null $userdata
     * @return array
     */
    public static function walk( array $array , callable $callback, mixed $userdata = NULL )
    {
        call_user_func('array_walk_recursive', $array , $callback, $userdata);
        return $array;
    }

    /**
     * @param $callback
     * @param array ...$arrays
     * @return array
     */
    public static function map($callback, ...$arrays)
    {
        $func = function ($item) use (&$func, &$callback) {

            return call_user_func($callback, array_map(function($value) use (&$func) {

                return is_array($value) ? call_user_func($func, $value) : $value;

            }, $item));
        };

        return array_map(function($array) use (&$func) {

            return call_user_func($func, $array);

        }, ...$arrays);
    }

    /**
     * @param array $array
     * @return RecursiveIteratorIterator
     */
    public static function getArrayIterator(Array $array)
    {
        return new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
    }

    /**
     * @param array $array
     * @param int $case
     * @return array
     */
    public static function change_key_case ( array $array, int $case = CASE_LOWER  )
    {
        return static::walk($array, 'array_change_key_case', $case);
    }


    /**
     * @param array ...$arrays
     * @return array
     */
    function sum(...$arrays)
    {
        return array_map(function($array){

            $total = 0;
            foreach(static::getArrayIterator($array) as $num)
            {
                $total += $num;
            }
            return $total;

        }, $arrays);
    }


    /**
     * @param $array
     */
    public static function reduce($array){

    }

    /**
     * @param $array
     * @return array
     */
    function product($array)
    {
        return static::map('array_product', $array);
    }


}
