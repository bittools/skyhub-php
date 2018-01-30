<?php

namespace SkyHub\Api\Handler\Request\Catalog\Product;

use SkyHub\Api\DataTransformers\Catalog\Product\Attribute\Create as CreateTransformer;
use SkyHub\Api\DataTransformers\Catalog\Product\Attribute\Update as UpdateTransformer;
use SkyHub\Api\Handler\Request\HandlerAbstract;
use SkyHub\Api\Handler\Response\HandlerInterface;

class AttributeHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/attributes';

    
    /**
     * @param string $code
     * @param string $label
     * @param array  $options
     *
     * @return HandlerInterface
     */
    public function create($code, $label, array $options = [])
    {
        $transformer = new CreateTransformer($code, $label, $options);
        $body        = $transformer->output();
        
         /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->post($this->baseUrlPath(), $body);
        
        return $responseHandler;
    }
    
    
    /**
     * @param string $code
     * @param string $label
     * @param array  $options
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function update($code, $label, array $options = [])
    {
        $transformer = new UpdateTransformer($code, $label, $options);
        $body        = $transformer->output();
    
        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->put($this->baseUrlPath($code), $body);
    
        return $responseHandler;
    }

}
