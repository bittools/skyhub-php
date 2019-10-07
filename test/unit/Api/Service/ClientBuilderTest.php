<?php

declare(strict_types = 1);

namespace SkyHubTest\unit\Api\Service;

use PHPUnit\Framework\TestCase;
use SkyHub\Api\Service\ClientBuilder;

/**
 * Class ClientBuilderTest
 *
 * @package SkyHubTest\unit\Api\Service
 */
class ClientBuilderTest extends TestCase
{
    /**
     * @var string
     */
    private $scheme = 'https';

    /**
     * @var string
     */
    private $host = 'example.com';

    /**
     * @var string
     */
    private $port = '9200';

    /**
     * @var string
     */
    private $path = 'path/to/resource';

    /**
     * @var string
     */
    private $query = 'user=admin&password=hidden';

    /**
     * @var string
     */
    private $baseUri = null;

    /**
     * @var array
     */
    private $defaults = [
        'timeout' => 10
    ];

    /**
     * @var \SkyHub\Api\Service\ClientBuilderInterface
     */
    private $builder;

    protected function setUp()
    {
        $this->baseUri = "{$this->scheme}://{$this->host}:{$this->port}/{$this->path}?$this->query";
        $this->builder = new ClientBuilder();
    }

    /**
     * Testing if the URI is correctly.
     *
     * @test
     */
    public function testBuildHttpClientInstance()
    {
        $client = $this->builder->build();
        $this->assertInstanceOf(\GuzzleHttp\ClientInterface::class, $client);
    }

    /**
     * Testing if the URI is correctly.
     *
     * @test
     */
    public function testBuildHttpClientBaseUri()
    {
        $client = $this->builder->build($this->baseUri);

        /** @var \Psr\Http\Message\UriInterface $baseUri */
        $baseUri = $client->getConfig('base_uri');

        $this->assertInstanceOf(\Psr\Http\Message\UriInterface::class, $baseUri);
        $this->assertEquals($this->scheme, $baseUri->getScheme());
        $this->assertEquals($this->host, $baseUri->getHost());
        $this->assertEquals($this->port, $baseUri->getPort());
        $this->assertEquals("/{$this->path}", $baseUri->getPath());
        $this->assertEquals($this->query, $baseUri->getQuery());
    }

    /**
     * Testing if the URI is correctly.
     *
     * @test
     */
    public function testBuildHttpClientOptions()
    {
        $client = $this->builder->build($this->baseUri, $this->defaults);
        $this->assertEquals($this->defaults['timeout'], $client->getConfig('defaults')['timeout']);
    }
}
