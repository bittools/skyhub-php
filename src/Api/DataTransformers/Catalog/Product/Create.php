<?php

namespace SkyHub\Api\DataTransformers\Catalog\Product;

use SkyHub\Api\DataTransformers\DataTransformerAbstract;

class Create extends DataTransformerAbstract
{

    /**
     * Attribute constructor.
     *
     * @param string $sku
     * @param array  $data
     */
    public function __construct($sku, array $data = [])
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

        /** Setup categories. */
        $categories = (array) arrayExtract($data, 'categories', []);
        $this->buildProductCategories($product, $categories);

        /** Setup images. */
        $images = (array) arrayExtract($data, 'images', []);
        $this->buildProductImages($product, $images);

        /** Setup specifications. */
        $specifications = (array) arrayExtract($data, 'specifications', []);
        $this->buildProductSpecifications($product, $specifications);

        /** Setup product variation attributes. */
        $variationAttributes = (array) arrayExtract($data, 'variation_attributes', []);
        $this->buildProductVariationAttributes($product, (array) $variationAttributes);

        /** Setup product variations. */
        $variations = (array) arrayExtract($data, 'variations', []);
        $this->buildProductVariation($product, $variations);

        $this->_outputData['product'] = $product;

        $this->prepareOutput();
    }


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
                'key'   => (string) arrayExtract($specification, 'key',   ''),
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
     * @param array $productData
     * @param array $variations
     *
     * @return array
     */
    protected function buildProductVariation(array &$productData, array $variations)
    {
        /** @var array $variation */
        foreach ($variations as $variation) {
            $productVariation = [
                'sku' => (string) arrayExtract($variation, 'sku', ''),
                'qty' => (int)    arrayExtract($variation, 'qty', 0),
                'ean' => (string) arrayExtract($variation, 'ean', ''),
            ];

            /** Build product variation's images. */
            if ($images = arrayExtract($variation, 'images')) {
                $this->buildProductImages($productVariation, (array) $images);
            }

            /** Build product variation's specifications. */
            if ($specifications = arrayExtract($variation, 'specifications')) {
                $this->buildProductSpecifications($productVariation, (array) $specifications);
            }

            $productData['variations'][] = $productVariation;
        }

        return $productData;
    }

}
