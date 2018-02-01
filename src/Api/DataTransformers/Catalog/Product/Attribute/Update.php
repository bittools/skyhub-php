<?php

namespace SkyHub\Api\DataTransformers\Catalog\Product\Attribute;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Update extends DataTransformerAbstract
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
        $this->setOutputData([
            'label'   => $label,
            'options' => $options
        ]);

        parent::__construct();
    }
}
