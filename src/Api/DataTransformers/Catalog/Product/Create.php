<?php

namespace SkyHub\Api\DataTransformers\Catalog\Product;

use SkyHub\Api\DataTransformers\Builders;
use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Create extends DataTransformerAbstract
{

    use Builders;


    /**
     * Attribute constructor.
     *
     * @param string $sku
     * @param array  $data
     * @param array  $images
     * @param array  $categories
     * @param array  $specifications
     * @param array  $variations
     * @param array  $variationAttributes
     */
    public function __construct(
        $sku,
        array $data = [],
        array $images = [],
        array $categories = [],
        array $specifications = [],
        array $variations = [],
        array $variationAttributes = []
    )
    {
        $product = [
            'sku'               => (string) $sku,
            'name'              => (string) arrayExtract($data, 'name', ''),
            'description'       => (string) arrayExtract($data, 'description', ''),
            'status'            => (string) arrayExtract($data, 'status', 'disabled'),
            'qty'               => (int)    arrayExtract($data, 'qty', 0),
            'price'             => (float)  arrayExtract($data, 'price', 0.0000),
            'promotional_price' => (float)  arrayExtract($data, 'promotional_price', 0.0000),
            'cost'              => (float)  arrayExtract($data, 'cost', 0.0000),
            'weight'            => (float)  arrayExtract($data, 'weight', 0.0000),
            'height'            => (float)  arrayExtract($data, 'height', 0.0000),
            'width'             => (float)  arrayExtract($data, 'width', 0.0000),
            'length'            => (float)  arrayExtract($data, 'length', 0.0000),
            'brand'             => (string) arrayExtract($data, 'brand', ''),
            'ean'               => (string) arrayExtract($data, 'ean', ''),
            'nbm'               => (string) arrayExtract($data, 'nbm', ''),
        ];

        /** Setup images. */
        $this->buildProductImages($product, $images);

        /** Setup categories. */
        $this->buildProductCategories($product, $categories);

        /** Setup specifications. */
        $this->buildProductSpecifications($product, $specifications);

        /** Setup product variations. */
        foreach ($variations as $variation) {
            $_sku            = arrayExtract($variation, 'sku', '');
            $_qty            = arrayExtract($variation, 'qty', 0);
            $_ean            = arrayExtract($variation, 'ean', '');
            $_images         = arrayExtract($variation, 'images', []);
            $_specifications = arrayExtract($variation, 'specifications', []);

            $this->buildProductVariation($product, $_sku, $_qty, $_ean, $_images, $_specifications);
        }

        /** Setup product variation attributes. */
        $this->buildProductVariationAttributes($product, $variationAttributes);

        $this->_outputData['product'] = $product;

        $this->prepareOutput();
    }

}
