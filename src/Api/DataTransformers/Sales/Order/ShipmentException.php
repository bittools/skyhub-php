<?php

namespace SkyHub\Api\DataTransformers\Sales\Order;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class ShipmentException extends DataTransformerAbstract
{

    /**
     * ShipmentException constructor.
     *
     * @param string $orderId
     * @param string $datetime
     * @param string $observation
     */
    public function __construct($orderId, $datetime, $observation)
    {
        /**
         * @todo Convert the $datetime to the correct format: '2012-10-06T04:13:00-03:00'
         */
        $shipmentException = [
            'shipment_exception' => [
                'occurrence_date' => $datetime,
                'observation'     => $observation
            ]
        ];

        $this->_outputData = $shipmentException;

        $this->prepareOutput();
    }

}
