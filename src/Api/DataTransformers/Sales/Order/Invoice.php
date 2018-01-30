<?php

namespace SkyHub\Api\DataTransformers\Sales\Order;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Invoice extends DataTransformerAbstract
{

    /**
     * Attribute constructor.
     *
     * @param string $status
     * @param string $invoiceKey
     */
    public function __construct($status, $invoiceKey)
    {
        $this->_outputData = [
            'status'  => $status,
            'invoice' => [
                'key' => $invoiceKey
            ],
        ];

        $this->prepareOutput();
    }

}
