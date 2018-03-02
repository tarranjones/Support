<?php
/**
 * Created by PhpStorm.
 * User: tarran
 * Date: 26/03/2017
 * Time: 12:09
 */

namespace TarranJones\Support;


/**
 * Class Obj
 * @package TarranJones\Support
 */
class Obj
{


    /**
     * @param object $object
     * @param array ...$varnames
     * @return array
     */
    public static function compact(object $object, ...$varnames){
        extract(static::getProperties($object));
        return compact(...$varnames);
    }

    /**
     * @param object $object
     * @return array
     */
    public static function getProperties(object $object){
        return get_object_vars( $object );
    }

    /**
     * @param $object
     * @param array $assocArray
     */
    public static function setProperties(&$object, array $assocArray){
        foreach ($assocArray as $propname => $value) {
            $object->{$propname} = $value;
        }
    }


}