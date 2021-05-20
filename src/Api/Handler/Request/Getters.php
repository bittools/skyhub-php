<?php
/**
 * B2W Digital - Companhia Digital
 *
 * Do not edit this file if you want to update this SDK for future new versions.
 * For support please contact the e-mail bellow:
 *
 * sdk@e-smart.com.br
 *
 * @category  SkyHub
 * @package   SkyHub
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br).
 *
 * @author    Tiago Sampaio <tiago.sampaio@e-smart.com.br>
 * @author    Bruno Gemelli <bruno.gemelli@e-smart.com.br>
 */

namespace SkyHub\Api\Handler\Request;

use SkyHub\Api\Handler\Request\Catalog\CategoryHandler;
use SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler;
use SkyHub\Api\Handler\Request\Catalog\ProductHandler;
use SkyHub\Api\Handler\Request\Sales\Order\QueueHandler;
use SkyHub\Api\Handler\Request\Sales\Order\StatusHandler;
use SkyHub\Api\Handler\Request\Sales\OrderHandler;
use SkyHub\Api\Handler\Request\Sales\SystemHandler;
use SkyHub\Api\Handler\Request\Shipment\PlpHandler;
use SkyHub\Api\Handler\Request\Sync\ErrorsHandler;
use SkyHub\Api\Handler\Request\Catalog\Product\VariationHandler;
use SkyHub\Api\Handler\Request\Catalog\Product\StockHandler as ProductStockHandler;
use SkyHub\Api\Handler\Request\Catalog\Product\PriceHandler as ProductPriceHandler;

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
     * @return PlpHandler
     */
    public function plp()
    {
        return new PlpHandler($this);
    }


    /**
     * @return ErrorsHandler
     */
    public function syncErrors()
    {
        return new ErrorsHandler($this);
    }

    /**
     * @return productStockHandler
     */
    public function productStock()
    {
        return new ProductStockHandler($this);
    }

    /**
     * @return productPriceHandler
     */
    public function productPrice()
    {
        return new ProductPriceHandler($this);
    }
}
