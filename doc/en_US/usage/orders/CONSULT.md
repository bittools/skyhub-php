# Requesting Orders

Orders requesting is made to obtain informations about an order but shouldn't be used to identify new orders. 

To know more about new orders request, see the documentation about [orders queue](QUEUE.md).

For more information, access the [official documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/orders).

Orders searching can be necessary to update order status in your platform, for example. 

### Requesting an Order

This method allow to request only an order a time.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->order($orderId);
// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/obter-um-pedido).

### Obtaining a List of Orders

The following method returns a list with all your orders in SkyHub.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->orders();
// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/listar-pedidos).

[Back](../../../../README.en_US.md)

[Continue: Working With Orders Queue](QUEUE.md)
