# Getting Order Tags

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->shipmentLabels($orderId);
// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/obter-etiqueta-de-frete).

[Back](../../../../README.en_US.md)

[Continue: Problems With Orders Delivery](SHIPPING_EXCEPTION.md)
