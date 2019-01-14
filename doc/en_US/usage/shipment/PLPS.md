# Posting

If the integration between SkyHub and marketplace B2W is made through API and you use `B2W Entrega`, you can group your orders into one PLP.


### Obtaining a PLP's List

You can obtain a list of PLPs using the following code snippet:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->plps();

// ...
```


### Obtaining an Orders List That Can be Grouped

You can obtain an orders list allowed to be grouped into a single PLP using the following code snippet:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->ordersReadyToGroup();

// ...
```


### Grouping Orders Into a Single PLP

You can group the orders into a PLP using the following code snippet:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

$orders = array(
    'CODIGO_PEDIDO_001',
    'CODIGO_PEDIDO_002'
);

/**
 * CREATE A PLP WITH ORDERS
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $requestHandler->group($orders);

// ...
```


### Ungroup a PLP

You can ungroup a PLP using the following code snippet:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->ungroup('PLP_ID');

// ...
```


### Load PLP

You can obtain the PDF of your PLP using the following code snippet:

```php
// ...

/** @var SkyHub\Api\ $service */
$service = new SkyHub\Api\Service\ServicePdf(null);

/** @var \SkyHub\Api $api */
$api = new SkyHub\Api($email, $apiKey, null, null, $service);

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->viewFile('PLP_ID');

// ...
```


For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.0/resources/postagem-plp).

[Back](../../../../README.en_US.md)

