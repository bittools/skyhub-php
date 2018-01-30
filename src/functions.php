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
}
