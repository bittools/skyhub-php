<?php

namespace SkyHub\Api\EntityInterface\Sales\Order;

use SkyHub\Api\EntityInterface\EntityAbstract;
use SkyHub\Api\Handler\Request\Sales\Order\QueueHandler;

class Queue extends EntityAbstract
{

    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function orders()
    {
        /** @var QueueHandler $handler */
        $handler = $this->requestHandler();
        return $handler->orders();
    }


    /**
     * @param string $orderId
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function delete($orderId)
    {
        /** @var QueueHandler $handler */
        $handler = $this->requestHandler();
        return $handler->delete($orderId);
    }
}
