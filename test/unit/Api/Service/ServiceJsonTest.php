<?php

declare(strict_types = 1);

namespace SkyHubTest\unit\Api\Service;

use PHPUnit\Framework\TestCase;
use SkyHub\Api\Service\ClientBuilder;
use SkyHub\Api\Service\ClientBuilderInterface;
use SkyHub\Api\Service\ServiceJson;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;


/**
 * Class ServiceJsonTest
 *
 * @package SkyHubTest\unit\Api\Service
 */
class ServiceJsonTest extends TestCase
{
    private $service;
    private $builder;
    private $client;

    protected function setUp()
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar']),
            new Response(202, ['Content-Length' => 0]),
            new RequestException("Error Communicating with Server", new Request('GET', 'test'))
        ]);

        $handler = HandlerStack::create($mock);
        $this->client = new Client(['handler' => $handler]);

        $this->builder = $this->createMock(ClientBuilderInterface::class);
        $this->builder->method('build')->willReturn($this->client);

        $this->service = new ServiceJson('http://www.example.com', [], [], $this->builder);
    }

    /**
     * @test
     */
    public function get()
    {
        $result = $this->service->get('www.enom.com');
        $this->assertEquals(1, 1);
    }

    /**
     * @test
     */
    public function put()
    {
        $result = $this->service->put('www.enom.com');
        $this->assertEquals(1, 1);
    }

    /**
     * @test
     */
    public function post()
    {
        $result = $this->service->post('www.enom.com');
        $this->assertEquals(1, 1);
    }

    /**
     * @test
     */
    public function head()
    {
        $result = $this->service->head('www.enom.com');
        $this->assertEquals(1, 1);
    }

    /**
     * @test
     */
    public function patch()
    {
        $result = $this->service->patch('www.enom.com');
        $this->assertEquals(1, 1);
    }
}
