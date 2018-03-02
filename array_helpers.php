<?php


if (! function_exists('empty_array_values')) {

    ///alias for array_fill_keys
    function empty_array_values($keys, $values)
    {
        return array_fill_keys($keys, $values);
    }

}
