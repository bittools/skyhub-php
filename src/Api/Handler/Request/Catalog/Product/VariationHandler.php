<?php

namespace SkyHub\Api\Handler\Request\Catalog\Product;

use SkyHub\Api\DataTransformers\Catalog\Product\Variation\Update;
use SkyHub\Api\Handler\Request\HandlerAbstract;
use SkyHub\Api\Handler\Response\HandlerInterface;

class VariationHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/variations';


    /**
     * @param string $sku
     *
     * @return HandlerInterface
     */
    public function get($sku)
    {
        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath($sku));
        return $responseHandler;
    }


    /**
     * @param string $sku
     *
     * @return HandlerInterface
     */
    public function delete($sku)
    {
        /** @var HandlerInterface $responseHandler */
        $responseHandler = $this->service()->delete($this->baseUrlPath($sku));
        return $responseHandler;
    }


    /**
     * @param string $sku
     * @param string $variationSku
     * @param string $variationQty
     * @param string $variationEan
     * @param array  $variationImages
     * @param array  $variationSpecifications
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function update(
        $sku,
        $variationSku,
        $variationQty = null,
        $variationEan = null,
        array $variationImages = [],
        array $variationSpecifications = []
    )
    {
        $transformer = new Update(
            $variationSku,
            $variationQty,
            $variationEan,
            $variationImages,
            $variationSpecifications
        );

        $body = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->put($this->baseUrlPath($sku), $body);
        return $responseHandler;
    }

}
