<?php

namespace SkyHub\Api\DataTransformers\Catalog\Product;

use SkyHub\Api\DataTransformers\Builders;
use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class CreateVariation extends DataTransformerAbstract
{

    use Builders;


    /**
     * CreateVariation constructor.
     *
     * @param       $sku
     * @param       $qty
     * @param       $ean
     * @param array $images
     * @param array $specifications
     */
    public function __construct(
        $sku,
        $qty,
        $ean,
        array $images = [],
        array $specifications = []
    )
    {
        $variation = [
            'sku' => (string) $sku,
            'qty' => (int)    $qty,
            'ean' => (string) $ean,
        ];

        /** Build product variation's images. */
        $this->buildProductImages($variation, (array) $images);

        /** Build product variation's specifications. */
        $this->buildProductSpecifications($variation, (array) $specifications);

        $this->_outputData['variation'] = $variation;

        $this->prepareOutput();
    }

}
