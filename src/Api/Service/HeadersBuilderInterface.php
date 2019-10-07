<?php

declare(strict_types = 1);

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
    public function addHeader(string $key, $value);

    /**
     * @param string $key
     *
     * @return string
     */
    public function getHeader(string $key);

    /**
     * @param string $key
     *
     * @return string
     */
    public function removeHeader(string $key);

    /**
     * @return array
     */
    public function getHeaders() : array;

    /**
     * @return array
     */
    public function build() : array;
}
