<?php

declare(strict_types = 1);

namespace SkyHubTest\unit\Api\Service;

use \PHPUnit\Framework\TestCase;
use SkyHub\Api\Service\OptionsBuilder;

/**
 * Class OptionsBuilderTest
 *
 * @package SkyHubTest\unit\Api\Service
 */
class OptionsBuilderTest extends TestCase
{
    /**
     * @var \SkyHub\Api\Service\OptionsBuilderInterface
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
        $this->builder = new OptionsBuilder();
    }

    /**
     * @test
     */
    public function setTimeout()
    {
        $this->builder->setTimeout(123);
        $this->assertEquals(['timeout' => 123, 'headers' => []], $this->builder->build());
    }

    /**
     * @test
     */
    public function setDebug()
    {
        $this->builder->setDebug(true);
        $this->assertEquals(['debug' => true, 'headers' => []], $this->builder->build());
    }

    /**
     * @test
     */
    public function setStream()
    {
        $this->builder->setStream(true);
        $this->assertEquals(['stream' => true, 'headers' => []], $this->builder->build());
    }

    /**
     * @test
     */
    public function setBody()
    {
        $this->builder->setBody('{"content":"Ok"}');
        $this->assertEquals(['body' => '{"content":"Ok"}', 'headers' => []], $this->builder->build());
    }

    /**
     * @test
     */
    public function setAllOptionsWithHeaders()
    {
        $expected = [
            'timeout' => 123,
            'debug'   => true,
            'stream'  => true,
            'body'    => '{"content":"This is the result"}',
            'headers' => $this->headers
        ];

        $this->builder->setTimeout(123);
        $this->builder->setDebug(true);
        $this->builder->setStream(true);
        $this->builder->setBody('{"content":"This is the result"}');
        $this->builder->getHeadersBuilder()->addHeaders($this->headers);

        $this->assertEquals($expected, $this->builder->build());
    }
}
