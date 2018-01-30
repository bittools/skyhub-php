<?php

namespace SkyHub\Api\Handler\Request\Sales\Order;

use SkyHub\Api\DataTransformers\Sales\Order\Status\Create;
use SkyHub\Api\DataTransformers\Sales\Order\Status\Update;
use SkyHub\Api\Handler\Request\HandlerAbstract;

class StatusHandler extends HandlerAbstract
{

    const TYPE_NEW                = 'NEW';
    const TYPE_CANCELLED          = 'CANCELLED';
    const TYPE_APPROVED           = 'APPROVED';
    const TYPE_SHIPPED            = 'SHIPPED';
    const TYPE_DELIVERED          = 'DELIVERED';
    const TYPE_OVERDUE            = 'OVERDUE';
    const TYPE_SHIPMENT_EXCEPTION = 'SHIPMENT_EXCEPTION';


    /** @var string */
    protected $baseUrlPath = '/statuses';


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function statuses()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath());
        return $responseHandler;
    }


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function types()
    {
        $this->baseUrlPath = '/status_types';

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath());
        return $responseHandler;
    }


    /**
     * @param string $code
     * @param string $label
     * @param string $type
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function create($code, $label, $type)
    {
        $transformer = new Create($code, $label, $type);
        $body = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->post($this->baseUrlPath(), $body);
        return $responseHandler;
    }


    /**
     * @param string $code
     * @param string $label
     * @param string $type
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function update($code, $label, $type)
    {
        $transformer = new Update($code, $label, $type);
        $body = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->put($this->baseUrlPath($code), $body);
        return $responseHandler;
    }

}
