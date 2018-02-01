<?php

namespace SkyHub\Api\DataTransformers\Catalog\Product\Variation;

use SkyHub\Api\DataTransformers\Builders;
use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Create extends DataTransformerAbstract
{

    use Builders;


    /**
     * CreateVariation constructor.
     *
     * @param string $sku
     * @param string $qty
     * @param string $ean
     * @param array  $images
     * @param array  $specifications
     */
    public function __construct($sku, $qty = null, $ean = null, array $images = [], array $specifications = [])
    {
        $variation['sku'] = (string) $sku;

        if ($qty) {
            $variation['qty'] = (int) $qty;
        }

        if ($ean) {
            $variation['ean'] = (string) $ean;
        }

        /** Build product variation's images. */
        $this->buildProductImages($variation, (array) $images);

        /** Build product variation's specifications. */
        $this->buildProductSpecifications($variation, (array) $specifications);

        $this->setOutputData(['variation' => $variation]);

        parent::__construct();
    }
}
