# Pedidos com Problemas de Entrega

### Criando uma Exceção de Transporte para um Pedido

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->shipmentException($orderId);
// ...
```

Para enviar um status customizado, basta passá-lo no último parâmetro. Por exemplo:
```php
// ...

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->shipmentException($orderId, '2019-06-06T04:13:00-03:00', 'Problems in transportation.', 'shipment_exception_custom');
```

*Observação: o status utilizado DEVE estar previamente cadastrado na SkyHub.*

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/excecao-de-transporte).

[Voltar](../../../../README.md)