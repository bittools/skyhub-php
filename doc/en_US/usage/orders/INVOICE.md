# Invoicing an Order

To invoice an order you need to have in hands the number of the `fiscal note` to send it on request.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$nfKey = '99999999999999999999999999999999999999999999';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->invoice($orderId, $nfKey);
// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/faturar-um-pedido).

[Back](../../../../README.en_US.md)

[Continue: Cancelling an Order](CANCEL.md)
