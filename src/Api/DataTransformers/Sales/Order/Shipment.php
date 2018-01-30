<?php

namespace SkyHub\Api\DataTransformers\Sales\Order;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Shipment extends DataTransformerAbstract
{

    /**
     * Shipment constructor.
     *
     * @param string $orderId
     * @param string $status
     * @param array  $items
     * @param string $trackCode
     * @param string $trackCarrier
     * @param string $trackMethod
     * @param string $trackUrl
     */
    public function __construct($orderId, $status, array $items, $trackCode, $trackCarrier, $trackMethod, $trackUrl)
    {
        $shipment = [
            'status'   => $status,
            'shipment' => [
                'code'  => $orderId,
                'track' => [
                    'code'    => $trackCode,
                    'carrier' => $trackCarrier,
                    'method'  => $trackMethod,
                    'url'     => $trackUrl,
                ]
            ]
        ];

        /** @var array $item */
        foreach ($items as $item) {
            $shipment['items'][] = [
                'sku' => $item['sku'],
                'qty' => $item['qty'],
            ];
        }

        $this->_outputData = $shipment;

        $this->prepareOutput();
    }

}
