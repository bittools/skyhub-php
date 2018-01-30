<?php

namespace SkyHub\Api\Handler\Request;

use SkyHub\Api\Handler\Request\Catalog\CategoryHandler,
    SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler,
    SkyHub\Api\Handler\Request\Catalog\ProductHandler,
    SkyHub\Api\Handler\Request\Sales\Order\QueueHandler,
    SkyHub\Api\Handler\Request\Sales\Order\StatusHandler,
    SkyHub\Api\Handler\Request\Sales\OrderHandler,
    SkyHub\Api\Handler\Request\Sales\SystemHandler,
    SkyHub\Api\Handler\Request\Sync\ErrorsHandler,
    SkyHub\Api\Handler\Request\Catalog\Product\VariationHandler;

trait Getters
{

    /**
     * @return AttributeHandler
     */
    public function productAttribute()
    {
        return new AttributeHandler($this);
    }


    /**
     * @return ProductHandler
     */
    public function product()
    {
        return new ProductHandler($this);
    }


    /**
     * @return VariationHandler
     */
    public function productVariations()
    {
        return new VariationHandler($this);
    }


    /**
     * @return CategoryHandler
     */
    public function category()
    {
        return new CategoryHandler($this);
    }


    /**
     * @return QueueHandler
     */
    public function queue()
    {
        return new QueueHandler($this);
    }


    /**
     * @return OrderHandler
     */
    public function order()
    {
        return new OrderHandler($this);
    }


    /**
     * @return StatusHandler
     */
    public function orderStatus()
    {
        return new StatusHandler($this);
    }


    /**
     * @return SystemHandler
     */
    public function saleSystems()
    {
        return new SystemHandler($this);
    }


    /**
     * @return ErrorsHandler
     */
    public function syncErrors()
    {
        return new ErrorsHandler($this);
    }

}
