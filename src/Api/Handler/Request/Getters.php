<?php

namespace SkyHub\Api\Handler\Request;

use SkyHub\Api\Handler\Request\Catalog\CategoryHandler;
use SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler;
use SkyHub\Api\Handler\Request\Catalog\ProductHandler;
use SkyHub\Api\Handler\Request\Sales\Order\QueueHandler;
use SkyHub\Api\Handler\Request\Sales\OrderHandler;

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
    
}
