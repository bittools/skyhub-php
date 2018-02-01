<?php

if (!function_exists('arrayIndexExists')) {
    /**
     * @param array  $data
     * @param string $index
     *
     * @return bool
     */
    function arrayIndexExists(array $data, $index) {
        return (bool) isset($data[$index]);
    };
}


if (!function_exists('arrayIsNotEmpty')) {
    /**
     * @param array  $data
     * @param string $index
     *
     * @return bool
     */
    function arrayIsNotEmpty(array $data, $index) {
        return (bool) (arrayIndexExists($data, $index) && $data[$index]);
    };
}


if (!function_exists('arrayExtract')) {
    /**
     * @param array                   $data
     * @param string                  $index
     * @param mixed|array|bool|string $default
     *
     * @return mixed|array|bool|string
     */
    function arrayExtract(array $data, $index, $default = false) {
        if (!arrayIsNotEmpty($data, $index)) {
            return $default;
        }

        return $data[$index];
    };
};


if (!function_exists('protect_string')) {
    /**
     * @param string $value
     * @param string $char
     * @param float  $density
     *
     * @return string
     */
    function protect_string($value, $char = '*', $density = 0.5)
    {
        $len            = strlen($value);
        $protectionSize = (int) ($len * (float) $density);
        
        $sidesAmount    = max((int) (($len-$protectionSize)/2), 0);
        
        $left   = substr($value, 0, $sidesAmount);
        $right  = substr($value, -$sidesAmount, $sidesAmount);
        $middle = str_repeat($char, $protectionSize);
        
        $value = implode([$left, $middle, $right]);
        
        return $value;
    };
};
