<?php

require_once __DIR__ . '/src/bootstrap.php';

$baseUri = 'https://api.skyhub.com.br';
$email = 'valdir.calixto@e-smart.com.br';
$apiKey = 'wxVMVTkf_csx17LioTjY';
$apiToken = 'bZa6Ml0zgS';

/** @var \SkyHub\Api $api */
$api = new SkyHub\Api($baseUri, $email, $apiKey, $apiToken);

/**
 * Attribute Creation and Update.
 */
//$responseCreate = $api->productAttribute()->create('color', 'Color', ['Blue', 'White', 'Green', 'Yellow']);
//$responseUpdate = $api->productAttribute()->update('color', 'Color', ['Blue', 'White', 'Green', 'Yellow', 'Orange']);

/**
 * Category List, Creation, Update and Delete.
 */
//$categories      = json_decode($api->category()->categories()->body(), true);
//$categoryCreated = $api->category()->create('accessories', 'Computer > Games > Accessoires');
//$categoryUpdated = $api->category()->update('accessories', 'Computer > Games > Accessories');
//$categoryDeleted = $api->category()->delete('accessories');

/**
 * Product List, Creation, Update and Delete
 */
$sku = 'foo';
$attributes = [
    "sku"                  => $sku,
    "name"                 => "foo",
    "description"          => "foo",
    "status"               => "enabled",
    "qty"                  => 0,
    "price"                => 0,
    "promotional_price"    => 0,
    "cost"                 => 0,
    "weight"               => 0,
    "height"               => 0,
    "width"                => 0,
    "length"               => 0,
    "brand"                => "foo",
    "ean"                  => "foo",
    "nbm"                  => "foo",
];

$categories = [[
    "code" => "foo",
    "name" => "foo"
]];

$specifications = [[
    "key"   => "foo",
    "value" => "foo"
]];

$var = [[
    "sku" => "foo",
    "qty" => 0,
    "ean" => "foo",
    "images" => ["foo", "foo", "foo"],
    "specifications" => [[
        "key"   => "foo",
        "value" => "foo"
    ]]
]];

$images  = ["foo", "foo", "foo"];
$varAttr = ["foo", "foo", "foo"];

$products         = json_decode($api->product()->products()->body(), true);
$product          = json_decode($api->product()->product($sku)->body(), true);
$productCreated   = $api->product()->create($sku, $attributes, $images, $categories, $specifications, $var, $varAttr);
$productUpdated   = $api->product()->update($sku, $attributes, $images, $categories, $specifications, $var, $varAttr);
$variationCreated = $api->product()->createVariation('foo', 'bar', 0, 'bar', ['bar'], [['key' => 'type', 'value' => 'bar']]);

echo '200 OK';
