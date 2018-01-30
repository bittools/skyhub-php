<?php

namespace SkyHub\Api\DataTransformers\Sales\Order\Status;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Create extends DataTransformerAbstract
{

    /**
     * Create constructor.
     *
     * @param string $code
     * @param string $label
     * @param string $type
     */
    public function __construct($code, $label, $type)
    {
        $this->_outputData = [
            'status' => [
                'code'  => $code,
                'label' => $label,
                'type'  => $type
            ]
        ];

        $this->prepareOutput();
    }

}
