# Obter Etiqueta de Frete

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->shipmentLabels($orderId);
// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/obter-etiqueta-de-frete).

[Voltar](../../../../README.md)

[Continuar: Pedidos com Problemas de Entrega](SHIPPING_EXCEPTION.md)
