<?php

namespace SkyHub;

use PHPUnit\Framework\TestCase;
use SkyHub\Api\Handler\Request\Catalog\CategoryHandler;
use SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler;
use SkyHub\Api\Handler\Request\Catalog\ProductHandler;

class ApiTest extends TestCase
{
    
    /** @var Api */
    protected $api       = null;

    /** @var string */
    protected $baseUri   = 'https://api.skyhub.com.br';

    /** @var string */
    protected $email     = 'test@e-smart.com.br';
    
    /** @var string */
    protected $apiKey    = 'testApiKey';
    
    /** @var string */
    protected $apiToken  = 'testApiToken';
    
    
    public function setUp()
    {
        $this->api = new Api($this->baseUri, $this->email, $this->apiKey, $this->apiToken);
    }
    
    
    /**
     * @test
     */
    public function getNewInstanceOfApiModel()
    {
        $this->assertInstanceOf(ApiInterface::class, $this->api);
    }
    
    
    /**
     * @test
     */
    public function getServiceInstance()
    {
        $this->assertInstanceOf(Api\Service\ServiceInterface::class, $this->api->service());
    }
    
    
    /**
     * @test
     */
    public function createNewInstanceOfProductAttributeHandler()
    {
        $this->assertInstanceOf(AttributeHandler::class, $this->api->productAttribute());
    }


    /**
     * @test
     */
    public function createNewInstanceOfProductHandler()
    {
        $this->assertInstanceOf(ProductHandler::class, $this->api->product());
    }


    /**
     * @test
     */
    public function createNewInstanceOfCategoryHandler()
    {
        $this->assertInstanceOf(CategoryHandler::class, $this->api->category());
    }
    
}
