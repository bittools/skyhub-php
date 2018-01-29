<?php

namespace SkyHub\Api\DataTransformers;

abstract class DataTransformerAbstract implements DataTransformerInterface
{
    
    /** @var array */
    protected $_outputData = [];
    
    
    /**
     * @return $this
     */
    protected function prepareOutput()
    {
        return $this;
    }
    
    
    /**
     * @return array|mixed
     */
    public function output()
    {
        return $this->_outputData;
    }
    
}