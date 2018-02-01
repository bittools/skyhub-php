<?php

namespace SkyHub\Api\DataTransformers;

use SkyHub\Api\DataTransformers\Catalog\Product\Variation\Create;

trait Builders
{


    /**
     * @param array $productData
     * @param array $images
     *
     * @return array
     */
    protected function buildProductImages(array &$productData, array $images)
    {
        /** @var string $image */
        foreach ($images as $image) {
            $productData['images'][] = (string) $image;
        }

        return $productData;
    }


    /**
     * @param array $productData
     * @param array $specifications
     *
     * @return array
     */
    protected function buildProductSpecifications(array &$productData, array $specifications)
    {
        /** @var array $specification */
        foreach ($specifications as $specification) {
            $productData['specifications'][] = [
                'key'   => (string) arrayExtract($specification, 'key', ''),
                'value' => (string) arrayExtract($specification, 'value', ''),
            ];
        }

        return $productData;
    }


    /**
     * @param array $productData
     * @param array $categories
     *
     * @return array
     */
    protected function buildProductCategories(array &$productData, array $categories)
    {
        /** @var array $categories */
        foreach ($categories as $category) {
            $productData['categories'][] = [
                'code' => (string) arrayExtract($category, 'code', ''),
                'name' => (string) arrayExtract($category, 'name', ''),
            ];
        }

        return $productData;
    }


    /**
     * @param array $productData
     * @param array $attributes
     *
     * @return array
     */
    protected function buildProductVariationAttributes(array &$productData, array $attributes)
    {
        /** @var string $attribute */
        foreach ($attributes as $attribute) {
            $productData['variation_attributes'][] = (string) $attribute;
        }

        return $productData;
    }


    /**
     * @param array  $productData
     * @param string $sku
     * @param string $qty
     * @param string $ean
     * @param array  $images
     * @param array  $specifications
     *
     * @return array
     */
    protected function buildProductVariation(
        array &$productData,
        $sku,
        $qty,
        $ean,
        array $images = [],
        array $specifications = []
    ) {
        $transformer = new Create($sku, $qty, $ean, $images, $specifications);
        $output      = $transformer->output();

        $productData['variations'][] = $output['variation'];

        return $productData;
    }
}
