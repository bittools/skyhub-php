<?php

declare(strict_types = 1);

namespace SkyHub\Api\Service;

use GuzzleHttp\Client as HttpClient;

/**
 * Class ClientBuilder
 *
 * @package SkyHub\Api\Service
 */
class ClientBuilder implements ClientBuilderInterface
{
    /**
     * @inheritDoc
     */
    public function build($baseUri = null, array $defaults = [])
    {
        return new HttpClient([
            'base_uri' => $baseUri,
            'defaults' => $defaults
        ]);
    }
}
