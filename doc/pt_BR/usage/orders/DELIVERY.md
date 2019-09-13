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

Para definir a data de entrega, basta informá-la no segundo parâmetro:

```php
// ...

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delivery($orderId, '10/09/2019');
```

Para enviar um status customizado, basta passá-lo no último parâmetro. Por exemplo:
```php
// ...

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delivery($orderId, null, 'complete_custom');
```

*Observação: o status utilizado DEVE estar previamente cadastrado na SkyHub.*

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/confirmar-entrega).

[Voltar](../../../../README.md)

[Continuar: Obtendo Etiquetas de Pedidos](LABELS.md)
