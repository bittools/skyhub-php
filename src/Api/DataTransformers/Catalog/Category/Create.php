<?php

namespace SkyHub\Api\DataTransformers\Catalog\Category;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Create extends DataTransformerAbstract
{

    /**
     * Attribute constructor.
     *
     * @param string $code
     * @param string $name
     */
    public function __construct($code, $name)
    {
        $this->_outputData = [
            'category' => [
                'code' => $code,
                'name' => $name
            ]
        ];

        parent::__construct();
    }

}
