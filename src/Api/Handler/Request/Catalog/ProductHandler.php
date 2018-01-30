<?php

namespace SkyHub\Api\Handler\Request\Catalog;

use SkyHub\Api\Handler\Request\HandlerAbstract;
use SkyHub\Api\DataTransformers\Catalog\Product\Variation\Create as CreateVariationTransformer,
    SkyHub\Api\DataTransformers\Catalog\Product\Create as CreateTransformer,
    SkyHub\Api\DataTransformers\Catalog\Product\Update as UpdateTransformer;

class ProductHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/products';


    /**
     * @param string $sku
     * @param array  $attributes
     * @param array  $images
     * @param array  $categories
     * @param array  $specifications
     * @param array  $variations
     * @param array  $variationAttributes
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function create(
        $sku,
        array $attributes,
        array $images = [],
        array $categories = [],
        array $specifications = [],
        array $variations = [],
        array $variationAttributes = []
    )
    {
        $transformer = new CreateTransformer(
            $sku,
            $attributes,
            $images,
            $categories,
            $specifications,
            $variations,
            $variationAttributes
        );

        $body = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->post($this->baseUrlPath(), $body);
        return $responseHandler;
    }


    /**
     * @param string $sku
     * @param array  $attributes
     * @param array  $images
     * @param array  $categories
     * @param array  $specifications
     * @param array  $variations
     * @param array  $variationAttributes
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function update(
        $sku,
        array $attributes,
        array $images = [],
        array $categories = [],
        array $specifications = [],
        array $variations = [],
        array $variationAttributes = []
    )
    {
        $transformer = new UpdateTransformer(
            $sku,
            $attributes,
            $images,
            $categories,
            $specifications,
            $variations,
            $variationAttributes
        );

        $body = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->put($this->baseUrlPath($sku), $body);
        return $responseHandler;
    }


    /**
     * @param null|string $status
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function products($status = null)
    {
        $query = [
            'status' => $status
        ];

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath(null, $query));
        return $responseHandler;
    }


    /**
     * @param string $sku
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function product($sku)
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath($sku));
        return $responseHandler;
    }


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function urls()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath('/urls'));
        return $responseHandler;
    }


    /**
     * @param string $sku
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function delete($sku)
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
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
    public function createVariation(
        $sku,
        $variationSku,
        $variationQty,
        $variationEan,
        array $variationImages = [],
        array $variationSpecifications = []
    )
    {
        $transformer = new CreateVariationTransformer(
            $variationSku,
            $variationQty,
            $variationEan,
            $variationImages,
            $variationSpecifications
        );

        $body = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->post($this->baseUrlPath("{$sku}/variations"), $body);
        return $responseHandler;
    }

}
