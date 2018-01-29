<?php

namespace SkyHub\Api\DataTransformers\Catalog\Product;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Attribute extends DataTransformerAbstract
{
    
    protected $_outputData = [];
    
    
    /**
     * Attribute constructor.
     *
     * @param string  $code
     * @param string $label
     * @param array  $options
     */
    public function __construct($code, $label, array $options = [])
    {
        $this->_outputData = [
            'name'    => $code,
            'label'   => $label,
            'options' => $options
        ];
        
        $this->prepareData();
    }
    
    
    /**
     * @return array|mixed
     */
    public function output()
    {
        return $this->_outputData;
    }

}
