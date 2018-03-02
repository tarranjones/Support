<?php
/**
 * Created by PhpStorm.
 * User: tarran
 * Date: 03/03/2017
 * Time: 20:30
 */

namespace TarranJones\Support;


class Mixed
{




    public static function utf8ize($value) {
        return static::ize('utf8_encode', $value);
    }

    public static function ize($callback, $value) {

        if (is_array( $value)) {
            foreach ( $value as $k => $v) {
                $value[call_user_func($callback, $k)] = call_user_func($callback, $v);
            }
        } elseif (is_object( $value)) {
            foreach ( $value as $k => $v) {
                $value->{call_user_func($callback, $k)} = call_user_func($callback, $v);
            }
        } else {
            return call_user_func($callback,  $value);
        }
        return $value;
    }


}