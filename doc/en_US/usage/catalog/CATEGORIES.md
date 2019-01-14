# Categories

The categories creation is simple way made. 

### Creating a Category

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->create('category001', 'Category 001');

// ...
```

### Updating a Category

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->update('category001', 'Updated Category 001 Name');

// ...
```

### Removing a Category

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delete('category001');

// ...
```

## Getting a List of Categories

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->categories();

// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/categories).

[Back](../../../../README.en_US.md)

[Continue: Orders](../ORDERS.md)
