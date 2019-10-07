<?php

declare(strict_types = 1);

namespace SkyHub\Api\Service;

/**
 * Class OptionsBuilderInterface
 *
 * @package SkyHub\Api\Service
 */
interface OptionsBuilderInterface
{
    /**
     * @param int $timeout
     *
     * @return $this
     */
    public function setTimeout(int $timeout);

    /**
     * @param bool $flag
     *
     * @return $this
     */
    public function setDebug(bool $flag);

    /**
     * @param mixed $body
     *
     * @return $this
     */
    public function setBody($body);

    /**
     * @param bool $body
     *
     * @return $this
     */
    public function setStream(bool $flag);

    /**
     * @return HeadersBuilderInterface
     */
    public function getHeadersBuilder() : HeadersBuilderInterface;

    /**
     * @return array
     */
    public function build() : array;
}
