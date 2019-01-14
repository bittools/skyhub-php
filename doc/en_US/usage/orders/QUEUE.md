# Working With Orders Queues

The orders queue must be requested to obtain data about new / update orders.

### Requesting the Next Order on the Queue

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\Order\QueueHandler $requestHandler */
$requestHandler = $api->queue();

/** @var \SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->orders();

// ...
```

### Removing an Order from the Queue

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\Order\QueueHandler $requestHandler */
$requestHandler = $api->queue();

$orderId = 'Marketplace-000000001';

/** @var \SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delete($orderId);

// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/queues).

[Back](../../../../README.en_US.md)

[Continue: Invoicing an Order](INVOICE.md)
