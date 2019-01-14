# Confirming an Order Delivery

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delivery($orderId);
// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/confirmar-entrega).

[Back](../../../../README.en_US.md)

[Continue: Getting Order Tags](LABELS.md)
