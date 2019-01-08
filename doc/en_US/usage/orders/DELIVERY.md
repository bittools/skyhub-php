# Confirmar Entrega de um Pedido

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delivery($orderId);
// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/confirmar-entrega).

[Voltar](../../../README.md)

[Continuar: Obtendo Etiquetas de Pedidos](LABELS.md)
