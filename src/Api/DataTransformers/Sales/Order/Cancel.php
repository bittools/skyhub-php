<?php

namespace SkyHub\Api\DataTransformers\Sales\Order;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Cancel extends DataTransformerAbstract
{

    /**
     * Attribute constructor.
     *
     * @param string $status
     */
    public function __construct($status)
    {
        $this->_outputData = [
            'status' => $status,
        ];

        $this->prepareOutput();
    }

}
