<?php

declare(strict_types = 1);

namespace SkyHub\Api\Service;

use SkyHub\Api\Helpers;

/**
 * Class OptionsBuilder
 *
 * @package SkyHub\Api\Service
 */
class OptionsBuilder implements OptionsBuilderInterface
{
    /**
     * @var HeadersBuilderInterface
     */
    private $headersBuilder;

    /**
     * @var array
     */
    private $options = [];

    public function __construct()
    {
        $this->headersBuilder = new HeadersBuilder();
    }

    /**
     * @inheritDoc
     */
    public function getHeadersBuilder() : HeadersBuilderInterface
    {
        return $this->headersBuilder;
    }

    /**
     * @inheritDoc
     */
    public function setTimeout(int $timeout)
    {
        $this->options['timeout'] = (int) $timeout;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDebug(bool $flag)
    {
        $this->options['debug'] = (bool) $flag;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBody($body)
    {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setStream(bool $flag)
    {
        $this->options['stream'] = (bool) $flag;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addOptions(array $options = [])
    {
        $this->options = array_merge_recursive($this->options, $options);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function build() : array
    {
        $this->options['headers'] = $this->getHeadersBuilder()->build();
        return $this->options;
    }
}
