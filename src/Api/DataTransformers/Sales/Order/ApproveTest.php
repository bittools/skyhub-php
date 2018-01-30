<?php

namespace SkyHub\Api\DataTransformers\Sales\Order;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class ApproveTest extends DataTransformerAbstract
{

    /**
     * Attribute constructor.
     *
     * @param string $orderId
     * @param string $status
     */
    public function __construct($orderId, $status)
    {
        $this->_outputData['status'] = $status;
        parent::__construct();
    }

}
