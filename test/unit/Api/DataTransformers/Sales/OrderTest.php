<?php

namespace SkyHub\Api\DataTransformers;

use PHPUnit\Framework\TestCase;
use SkyHub\Api\DataTransformers\Sales\Order\ApproveTest;
use SkyHub\Api\DataTransformers\Sales\Order\Cancel;
use SkyHub\Api\DataTransformers\Sales\Order\Delivery;
use SkyHub\Api\DataTransformers\Sales\Order\Invoice;
use SkyHub\Api\DataTransformers\Sales\Order\Shipment;
use SkyHub\Api\DataTransformers\Sales\Order\ShipmentException;
use SkyHub\Api\DataTransformers\Sales\Order\Status\Create;
use SkyHub\Api\DataTransformers\Sales\Order\Status\Update;
use SkyHub\Api\Handler\Request\Sales\Order\StatusHandler;
use SkyHub\Api\Handler\Request\Sales\OrderHandler;

class OrderTest extends TestCase
{

    /**
     * @test
     */
    public function assertDataTransformerOrderCancel()
    {
        $transformer = new Cancel(StatusHandler::TYPE_SHIPPED);
        $expected = [
            'status' => StatusHandler::TYPE_SHIPPED
        ];

        $this->assertEquals($expected, $transformer->output());
    }


    /**
     * @test
     */
    public function assertDataTransformerOrderDelivery()
    {
        $transformer = new Delivery(StatusHandler::TYPE_SHIPPED);
        $expected = [
            'status' => StatusHandler::TYPE_SHIPPED
        ];

        $this->assertEquals($expected, $transformer->output());
    }


    /**
     * @test
     */
    public function assertDataTransformerOrderInvoice()
    {
        $invoiceKey = '999888777999888777';
        $transformer = new Invoice(OrderHandler::STATUS_PAID, $invoiceKey);
        $expected = [
            'status'  => OrderHandler::STATUS_PAID,
            'invoice' => [
                'key' => $invoiceKey
            ],
        ];

        $this->assertEquals($expected, $transformer->output());
    }


    /**
     * @test
     */
    public function assertDataTransformerOrderShipmentException()
    {
        $orderId = '99';
        $datetime = '2018-01-20 16:00:00';
        $observation = 'This is a simple observation';

        $transformer = new ShipmentException($orderId, $datetime, $observation);
        $expected = [
            'shipment_exception' => [
                'occurrence_date' => $datetime,
                'observation'     => $observation
            ]
        ];

        $this->assertEquals($expected, $transformer->output());
    }


    /**
     * @test
     */
    public function assertDataTransformerOrderShipment()
    {
        $orderId = '12345';
        $status = OrderHandler::STATUS_SHIPPED;
        $trackCode = 'SS987654321XX';
        $trackCarrier = 'Correios';
        $trackMethod = 'PAC';
        $trackUrl = 'http://www.correios.com.br';
        $items = [
            [
                'sku' => 'XYZ',
                'qty' => '2',
            ], [
                'sku' => 'QWE',
                'qty' => '4',
            ]
        ];

        $transformer = new Shipment($orderId, $status, $items, $trackCode, $trackCarrier, $trackMethod, $trackUrl);
        $expected = [
            'status'   => $status,
            'shipment' => [
                'code'  => $orderId,
                'track' => [
                    'code'    => $trackCode,
                    'carrier' => $trackCarrier,
                    'method'  => $trackMethod,
                    'url'     => $trackUrl,
                ]
            ],
            'items' => $items
        ];

        $this->assertEquals($expected, $transformer->output());
    }


    /**
     * @test
     */
    public function assertDataTransformerOrderStatusCreate()
    {
        $code = '99';
        $label = 'This is a Label';
        $type = 'NEW';

        $transformer = new Create($code, $label, $type);
        $expected = [
            'status' => [
                'code'  => $code,
                'label' => $label,
                'type'  => $type
            ]
        ];

        $this->assertEquals($expected, $transformer->output());
    }


    /**
     * @test
     */
    public function assertDataTransformerOrderStatusUpdate()
    {
        $code = '99';
        $label = 'This is a Label';
        $type = 'NEW';

        $transformer = new Update($code, $label, $type);
        $expected = [
            'status' => [
                'code'  => $code,
                'label' => $label,
                'type'  => $type
            ]
        ];

        $this->assertEquals($expected, $transformer->output());
    }


    /**
     * @test
     */
    public function assertDataTransformerOrderApproveTest()
    {
        $orderId = '99';
        $status  = 'NEW';

        $transformer = new ApproveTest($orderId, $status);
        $expected = [
            'status' => $status
        ];

        $this->assertEquals($expected, $transformer->output());
    }

}
