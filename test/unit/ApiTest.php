<?php

use PHPUnit\Framework\TestCase;
use SkyHub\Api;

class ApiTest extends TestCase
{
    
    /** @var SkyHub\Api */
    protected $api = null;
    
    
    public function setUp()
    {
        $email     = 'valdir.calixto@e-smart.com.br';
        $apiKey    = 'wxVMVTkf_csx17LioTjY';
        $apiToken  = 'bZa6Ml0zgS';
        
        $this->api = new Api($email, $apiKey, $apiToken);
    }
    
    
    /**
     * @test
     */
    public function getConnection()
    {
        $this->assertInstanceOf(Api\Service::class, $this->api->getService());
    }
    
}
