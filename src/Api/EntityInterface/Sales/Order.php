<?php

namespace SkyHub\Api\EntityInterface\Sales;

use SkyHub\Api\EntityInterface\EntityAbstract;
use SkyHub\Api\Handler\Request\Sales\OrderHandler;

class Order extends EntityAbstract
{
    
    /**
     * @param int   $page
     * @param int   $perPage
     * @param null  $saleSystem
     * @param array $statuses
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function orders($page = 1, $perPage = 30, $saleSystem = null, array $statuses = [])
    {
        /** @var OrderHandler $handler */
        $handler = $this->requestHandler();
        return $handler->orders($page, $perPage, $saleSystem, $statuses);
    }

}
