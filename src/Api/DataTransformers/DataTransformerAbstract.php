<?php

namespace SkyHub\Api\DataTransformers;

abstract class DataTransformerAbstract implements DataTransformerInterface
{
    
    /**
     * @return $this
     */
    protected function prepareData()
    {
        return $this;
    }
    
}
