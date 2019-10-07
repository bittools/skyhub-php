<?php

declare(strict_types = 1);

namespace SkyHub\Api\Service;

use SkyHub\Api\Helpers;

/**
 * Class HeadersBuilder
 *
 * @package SkyHub\Api\Service
 */
class HeadersBuilder implements HeadersBuilderInterface
{
    use Helpers;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @inheritDoc
     */
    public function reset()
    {
        $this->headers = [];
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHeaders(array $headers = [])
    {
        foreach ($headers as $key => $value) {
            $this->addHeader($key, $value);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHeader(string $key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHeader(string $key)
    {
        return $this->headers[$key];
    }

    /**
     * @inheritDoc
     */
    public function removeHeader(string $key)
    {
        unset($this->headers[$key]);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHeaders() : array
    {
        return $this->headers;
    }

    /**
     * @inheritDoc
     */
    public function build() : array
    {
        return $this->getHeaders();
    }
}
