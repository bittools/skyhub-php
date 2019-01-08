# Faturando um Pedido

Para faturar um pedido você precisa ter em mãos a chave da nota fiscal para enviá-la na requisição.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$nfKey = '99999999999999999999999999999999999999999999';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->invoice($orderId, $nfKey);
// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/faturar-um-pedido).

[Voltar](../../../README.md)

[Continuar: Cancelando um Pedido](CANCEL.md)
