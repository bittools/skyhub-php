# Cancelando um Pedido

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->cancel($orderId);
// ...
```

Para enviar um status customizado, basta passá-lo no último parâmetro. Por exemplo:
```php
// ...

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->cancel($orderId, 'order_canceled_custom');
```

*Observação: o status utilizado DEVE estar previamente cadastrado na SkyHub.*

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/cancelar-um-pedido).

[Voltar](../../../../README.md)

[Continuar: Adicionando um Tracking de Pedido](TRACKING.md)
