<?php

namespace SkyHub\Api\DataTransformers\Catalog\Product\Attribute;

class Update extends Create
{
    
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
            'label'   => $label,
            'options' => $options
        ];

        parent::__construct();
    }

}
