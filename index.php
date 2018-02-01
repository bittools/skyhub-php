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
$responseCreate = $api->productAttribute()->create('color', 'Color', ['Blue', 'White', 'Green', 'Yellow']);
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
$sku = 'BSeller SkyHub';
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

$var = [
    [
        "sku" => "foo",
        "qty" => 250,
        "ean" => "foo",
        "images" => [
            "http://d26lpennugtm8s.cloudfront.net/stores/154/284/products/camiseta-lisa-verde-bandeira-algodo-p-ao-gg-pronta-entrega-355901-mlb20431777049_092015-o-07fadec89e5ed54705c1b9ab5411dec8-1024-1024.jpg"
        ],
        "specifications" => [
            [
                "key"   => "price",
                "value" => "15"
            ],
            [
                "key"   => "size",
                "value" => "M"
            ],
            [
                "key"   => "color",
                "value" => "Red"
            ],
        ]
    ],
    [
        "sku" => "bar",
        "qty" => 300,
        "ean" => "bar",
        "images" => [
            "http://d26lpennugtm8s.cloudfront.net/stores/154/284/products/camiseta-lisa-verde-bandeira-algodo-p-ao-gg-pronta-entrega-355901-mlb20431777049_092015-o-07fadec89e5ed54705c1b9ab5411dec8-1024-1024.jpg"
        ],
        "specifications" => [
            [
                "key"   => "price",
                "value" => "20"
            ],
            [
                "key"   => "size",
                "value" => "G"
            ],
            [
                "key"   => "color",
                "value" => "Gray"
            ],
        ]
    ]
];

$images  = [
    "http://d26lpennugtm8s.cloudfront.net/stores/154/284/products/camiseta-lisa-verde-bandeira-algodo-p-ao-gg-pronta-entrega-355901-mlb20431777049_092015-o-07fadec89e5ed54705c1b9ab5411dec8-1024-1024.jpg",
    "http://d26lpennugtm8s.cloudfront.net/stores/154/284/products/camiseta-lisa-verde-bandeira-algodo-p-ao-gg-pronta-entrega-355901-mlb20431777049_092015-o-07fadec89e5ed54705c1b9ab5411dec8-1024-1024.jpg",
    "http://d26lpennugtm8s.cloudfront.net/stores/154/284/products/camiseta-lisa-verde-bandeira-algodo-p-ao-gg-pronta-entrega-355901-mlb20431777049_092015-o-07fadec89e5ed54705c1b9ab5411dec8-1024-1024.jpg"
];
$varAttr = [
    "price",
    "color",
    "size"
];

//$products         = json_decode($api->product()->products()->body(), true);
//$product          = json_decode($api->product()->product($sku)->body(), true);
//$productCreated   = $api->product()->create($sku, $attributes, $images, $categories, $specifications, $var, $varAttr);
//$productUpdated   = $api->product()->update($sku, $attributes, $images, $categories, $specifications, $var, $varAttr);
//$variationCreated = $api->product()->createVariation('foo', 'bar', 0, 'bar', ['bar'], [['key' => 'type', 'value' => 'bar']]);
//$productsUrls     = $api->product()->urls();


/**
 * Orders queue List and Delete
 */
//$orders = json_decode($api->queue()->orders()->body());
//$remove = json_decode($api->queue()->deleteOrder('12345678')->body());

/**
 * Orders List and Delete
 */
// $orders = $api->order()->orders();

/**
 * Orders Status Types
 */
//$statusTypes = json_decode($api->orderStatus()->types()->body());

/**
 * Sync Errors
 */
//$api->syncErrors()->ignoreOrderErrors();

/**
 * Product Variation
 */
// $api->productVariations()->get();
// $api->productVariations()->delete();
// $api->productVariations()->update();

echo '200 OK';
