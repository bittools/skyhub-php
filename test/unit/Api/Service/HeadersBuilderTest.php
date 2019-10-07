<?php

declare(strict_types = 1);

namespace SkyHubTest\unit\Api\Service;

use PHPUnit\Framework\TestCase;
use SkyHub\Api\Service\HeadersBuilder;
use SkyHub\Api\Service\HeadersBuilderInterface;

/**
 * Class HeadersBuilderTest
 *
 * @package SkyHubTest\unit\Api\Service
 */
class HeadersBuilderTest extends TestCase
{
    /**
     * @var HeadersBuilder
     */
    private $builder;

    /**
     * @var array
     */
    private $headers = [
        'Accept'                => 'application/json',
        'Content-type'          => 'application/json',
        'Sample-user'           => 'User',
        'X-Account-Manager-Key' => '0a98sdfy0a98df0a9sdf',
    ];

    protected function setUp()
    {
        $this->builder = new HeadersBuilder();
    }

    /**
     * @test
     */
    public function addHeader()
    {
        $result = $this->builder->addHeader('X-Account-Manager-Key', 'XYZ');
        $this->assertEquals('XYZ', $this->builder->getHeader('X-Account-Manager-Key'));
        $this->assertInstanceOf(HeadersBuilderInterface::class, $result);
    }

    /**
     * @test
     */
    public function setHeadersOneByTime()
    {
        foreach ($this->headers as $key => $value) {
            $this->builder->addHeader($key, $value);
        }

        $this->assertEquals($this->headers, $this->builder->build());
    }

    /**
     * @test
     */
    public function setHeaders()
    {
        $this->builder->addHeaders($this->headers);
        $this->assertEquals($this->headers, $this->builder->build());
        $this->assertEquals(
            $this->headers['X-Account-Manager-Key'],
            $this->builder->getHeader('X-Account-Manager-Key')
        );
    }
}
