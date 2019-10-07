<?php

namespace SkyHub\Api\Service;

/**
 * Class HeadersBuilderInterface
 *
 * @package SkyHub\Api\Service
 */
interface HeadersBuilderInterface
{
    /**
     * @return $this
     */
    public function reset();

    /**
     * @param array $headers
     *
     * @return $this
     */
    public function addHeaders(array $headers = []);

    /**
     * @param string       $key
     * @param string|mixed $value
     *
     * @return $this
     */
    public function addHeader($key, $value);

    /**
     * @param string $key
     *
     * @return string
     */
    public function getHeader($key);

    /**
     * @param string $key
     *
     * @return string
     */
    public function removeHeader($key);

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return array
     */
    public function build();
}
