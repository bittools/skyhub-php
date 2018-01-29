<?php

namespace SkyHub\Api\Handler\Request;

use SkyHub\Api\DataTransformers\DataTransformerInterface;
use SkyHub\Api\Service\ServiceInterface;
use SkyHub\ApiInterface;

abstract class HandlerAbstract implements HandlerInterface
{
    
    /** @var ApiInterface */
    private $api;
    
    /** @var DataTransformerInterface */
    protected $_transformer = null;
    
    /** @var string */
    protected $_transformerClass = null;
    
    
    /**
     * AbstractHandler constructor.
     *
     * @param ApiInterface $api
     */
    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }
    
    
    /**
     * @return DataTransformerInterface
     */
    protected function transformer()
    {
        if (empty($this->_transformerClass)) {
            $this->_transformer = new $this->_transformerClass();
        }
        
        return $this->_transformer;
    }
    
    
    /**
     * @return ServiceInterface
     */
    protected function service()
    {
        return $this->api->service();
    }
    
    
    /**
     * @return ApiInterface
     */
    public function api()
    {
        return $this->api;
    }

}
