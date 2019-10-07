<?php

declare(strict_types = 1);

namespace SkyHub\Api\Service;

/**
 * Class ClientBuilderInterface
 *
 * @package SkyHub\Api\Service
 */
interface ClientBuilderInterface
{
    /**
     * @param string $baseUri
     * @param array  $defaults
     *
     * @return \GuzzleHttp\ClientInterface
     */
    public function build($baseUri = null, array $defaults = []);
}
