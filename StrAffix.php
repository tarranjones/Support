<?php
/**
 * Created by PhpStorm.
 * User: tarran
 * Date: 03/03/2017
 * Time: 12:34
 */

namespace TarranJones\Support;


class StrAffix
{
//    public static function __callStatic($name, $arguments)
//    {
//        return (string) isset($arguments[0]) ? $arguments[0] : "";
//    }
    public static function prefix($original, $affix){
        return (string) $affix . $original;
    }
    public static function suffix($original, $affix){
        return (string) $original . $affix;
    }
    public static function circumfix($original, $affix){
        if(is_array($affix) && count($affix) == 2){
            return (string) $affix[0] . $original . $affix[1];
        }
        return (string) $original;
    }
    public static function simulfix($original, $affixes, $phonemes){
        return str_replace($phonemes, $affixes, $original);
    }
}
