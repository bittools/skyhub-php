# Enviar Dados de Entrega de um Pedido

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

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/enviar-dados-de-entrega).

[Voltar](../../../../README.md)

[Continuar: Confirmar Entrega de um Pedido](DELIVERY.md)
