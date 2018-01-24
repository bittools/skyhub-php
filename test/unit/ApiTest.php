<?php

namespace SkyHub;

use PHPUnit\Framework\TestCase;
use SkyHub\Api;
use SkyHub\Api\Handlers\Catalog\Product\AttributeHandler;

class ApiTest extends TestCase
{
    
    /** @var Api */
    protected $api       = null;

    /** @var string */
    protected $email     = 'test@e-smart.com.br';
    
    /** @var string */
    protected $apiKey    = 'testApiKey';
    
    /** @var string */
    protected $apiToken  = 'testApiToken';
    
    
    public function setUp()
    {
        $this->api = new Api($this->email, $this->apiKey, $this->apiToken);
    }
    
    
    /**
     * @test
     */
    public function getNewInstanceOfApiModel()
    {
        $this->assertInstanceOf(Api::class, new Api($this->email, $this->apiKey, $this->apiToken));
    }
    
    
    /**
     * @test
     */
    public function getServiceInstance()
    {
        $this->assertInstanceOf(Api\Service::class, $this->api->getService());
    }
    
    
    /**
     * @test
     */
    public function createNewInstanceOfCatalogProductAttributeHandler()
    {
        $this->assertInstanceOf(AttributeHandler::class, $this->api->catalogProductAttribute());
    }
    
}
