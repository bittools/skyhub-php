# Products

With the attributes products integrated, it's time to begin to integrate the products of your catalog.


### Creating and Updating Products on SkyHub

The products creation on SkyHub need a few informations like SKU, Name, Description, etc.

To integrate a product, see the following example:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

$sku = 'sku123';

$attributes = array(
    'sku'               => $sku,
    'name'              => 'Sample Product',
    'description'       => 'Sample Product Description',
    'status'            => 'enabled',
    'qty'               => 123,
    'price'             => 2.3458,
    'promotional_price' => 1.9876,
    'cost'              => 1.2090,
    'weight'            => 1.45,
    'height'            => 1.45,
    'width'             => 1.45,
    'length'            => 1.45,
    'brand'             => 'Nike',
    'ean'               => '01234567890',
    'nbm'               => '11234567890',
);

$images = array(
    'http://sourceimage001.jpg',
    'http://sourceimage002.jpg',
    'http://sourceimage003.jpg'
);

$categories = array(
    array(
        'code' => 'foo',
        'name' => 'Foo > Foo',
    ),
    array(
        'code' => 'bar',
        'name' => 'Bar > Bar',
    )
);

$specifications = array(
    array(
        'key'   => 'color',
        'value' => 'Black',
    ), array(
        'key'   => 'size',
        'value' => 'XL',
    ), array(
        'key'   => 'voltage',
        'value' => '220v',
    )
);

$variations = array(
    array(
        'sku'    => 'variation001',
        'qty'    => 100,
        'ean'    => '9876565',
        'images' => array(
            'http://variation-sourceimage001.jpg',
            'http://variation-sourceimage002.jpg',
            'http://variation-sourceimage003.jpg',
        ),
        'specifications' => array(
            array(
                'key'   => 'color',
                'value' => 'White'
            ),
            array(
                'key'   => 'size',
                'value' => 'S'
            )
        ),
    ),
);

$variationAttributes = array(
    'color',
    'size'
);

/**
 * CREATE A PRODUCT
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $requestHandler->create(
    $sku,
    $attributes,
    $images,
    $categories,
    $specifications,
    $variations,
    $variationAttributes
);

/**
 * UPDATE A PRODUCT
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $requestHandler->update(
    $sku,
    $attributes,
    $images,
    $categories,
    $specifications,
    $variations,
    $variationAttributes
);

// ...
```

### Removing a Product

To delete a product, use the following method.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delete('sku123');

// ...
```

### Retrieving a Product Informations

You can retrieve informations of an unique product using the following code snippet:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->product('sku123');

// ...
```

### Retrieving a Products List

You can retrieve a products list using the following code snippet:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->products(['status' => 'foo']);

// ...
```

### Retrieving Products URLs on MarketPlaces


You can retrieve a list of products URLs (marketplaces) using the following code snippet:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->urls();

// ...
```

### Simpler Way to Integrate Products

However it may be a simple way to create a product, you can call the layer `EntityInterfaces` to simplify even more the creation of the product, decreasing the chance to get errors on structure creation.

The first thing to do is to fill all needed informations.

```php
// ...

/** @var \SkyHub\Api\EntityInterface\Catalog\Product $entityInterface */
$entityInterface = $api->product()
                       ->entityInterface();
                       
$entityInterface->setSku('sku123')
        ->setName('Sample Product')
        ->setDescription('Sample Product Description')
        ->setStatus('enabled')
        ->setQty(123)
        ->setPrice(2.3458)
        ->setPromotionalPrice(1.9876)
        ->setCost(1.2090)
        ->setWeight(1.45)
        ->setHeight(1.45)
        ->setWidth(1.45)
        ->setLength(1.45)
        ->setBrand('Nike')
        ->setEan('01234567890')
        ->setNbm('11234567890')
        ->addCategory('foo', 'Foo > Foo')
        ->addCategory('bar', 'Bar > Bar')
        ->addImage('http://sourceimage001.jpg')
        ->addImage('http://sourceimage002.jpg')
        ->addImage('http://sourceimage003.jpg')
        ->addSpecification('color', 'Black')
        ->addSpecification('size', 'XL')
        ->addSpecification('voltage', '220v')
        ->addVariationAttribute('color')
        ->addVariationAttribute('size');

/** @var \SkyHub\Api\EntityInterface\Catalog\Product\Variation $variation */
$variation = $entityInterface->addVariation('variation001', 100, '9876565');
$variation->addImage('http://variation-sourceimage001.jpg')
          ->addImage('http://variation-sourceimage002.jpg')
          ->addImage('http://variation-sourceimage003.jpg')
          ->addSpecification('color', 'White')
          ->addSpecification('size', 'S');

/**
 * Create a Single Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->create();

/**
 * Update a Single Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->update();
// ...
```

It's also possible to call other methods through product's `EntityInterface`.

```php
// ...

/** @var \SkyHub\Api\EntityInterface\Catalog\Product $entityInterface */
$entityInterface = $api->product()
                       ->entityInterface();
                       
$entityInterface->setSku('sku123')

/**
 * Delete a Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->delete();

/**
 * Get a Single Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->product();

/**
 * Get a Product MarketPlace URLs
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->urls();

// ...
```

To the following methods it's not necessary to call any `setter`, like above cases did.

```php
// ...

/** @var \SkyHub\Api\EntityInterface\Catalog\Product $entityInterface */
$entityInterface = $api->product()
                       ->entityInterface();

/**
 * Retrieve a List of Products
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->products();

// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/products).

[Back](../../../../README.en_US.md)

[Continue: Categories](CATEGORIES.md)
