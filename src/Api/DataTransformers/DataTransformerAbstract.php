<?php

namespace SkyHub\Api\DataTransformers;

abstract class DataTransformerAbstract implements DataTransformerInterface
{
    
    /** @var array */
    protected $outputData = [];
    
    
    /**
     * DataTransformerAbstract constructor.
     */
    public function __construct()
    {
        $this->prepareOutput();
    }
    
    
    /**
     * @return $this
     */
    protected function prepareOutput()
    {
        return $this;
    }
    
    
    /**
     * @param string|array $data
     *
     * @return $this
     */
    protected function setOutputData($data)
    {
        $this->outputData = $data;
        return $this;
    }
    
    
    /**
     * @return array|mixed
     */
    public function output()
    {
        return $this->outputData;
    }
}
