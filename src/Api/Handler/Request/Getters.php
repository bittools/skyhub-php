<?php

namespace SkyHub\Api\Handlers\Request;

use SkyHub\Api\Handler\Request\Catalog\CategoryHandler;
use SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler;
use SkyHub\Api\Handler\Request\Catalog\ProductHandler;

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
    
}
