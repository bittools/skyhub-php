# Product Attributes

To integrate your products, first you need to integrate the products attributes. 

### Creating Attributes

To create a product attribute:

```php
// ...

/** @var SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler $requestHandler */
$requestHandler = $api->productAttribute();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->create('color', 'Color', [
    'Blue',
    'White'
]);

// ...
```

### Updating Attributes

When the attribute already exists on SkyHub and you need to update it:

```php
// ...

/** @var SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler $requestHandler */
$requestHandler = $api->productAttribute();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->update('color', 'Color', [
    'Blue',
    'White',
    'Green',
    'Yellow',
    'Black',
    'Red'
]);

// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/attributes).

[Back](../../../../README.en_US.md)

[Continue: Products](PRODUCTS.md)
