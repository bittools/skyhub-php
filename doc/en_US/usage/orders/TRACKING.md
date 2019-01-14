# Sending Order Delivery Data 

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$items = [
    'sku' => '1001',
    'qty' => 1,
];

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->shipment(
    $orderId,
    $items,
    'BR1321830198302DR',
    'Correios',
    'SEDEX',
    'www.correios.com.br'
);

// ...
```

For more information, access the [official_documentation](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/enviar-dados-de-entrega).

[Back](../../../../README.en_US.md)

[Continue: Confirming a Product's Delivery](DELIVERY.md)
