<?php

require_once __DIR__ . '/src/bootstrap.php';

$baseUri  = 'https://api.skyhub.com.br';
$email    = 'valdir.calixto@e-smart.com.br';
$apiKey   = 'wxVMVTkf_csx17LioTjY';
$apiToken = 'bZa6Ml0zgS';

/** @var \SkyHub\Api $api */
$api = new SkyHub\Api($baseUri, $email, $apiKey, $apiToken);

$test = (array) false;

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

echo '200 OK';
