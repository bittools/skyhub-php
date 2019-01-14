# Consultando Pedidos

A consulta de pedidos é feita para obter as informações de um pedido, porém não deve ser utilizada para identificar pedidos novos.

Para saber mais sobre consulta de pedidos novos, veja a documentação sobre a [fila de pedidos](QUEUE.md).

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders).

A consulta de pedidos pode ser necessária para atualização de status do pedido em sua plataforma, por exemplo.

### Consultando um Pedido

Este método permite consultar apenas um pedido por vez.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

$orderId = 'Marketplace-000000001';

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->order($orderId);
// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/obter-um-pedido).

### Obter uma Lista de Pedidos

O método abaixo retorna uma lista com todos os seus pedidos na SkyHub.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\OrderHandler $requestHandler */
$requestHandler = $api->order();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->orders();
// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/orders/endpoints/listar-pedidos).

[Voltar](../../../../README.md)

[Continuar: Trabalhando com Filas de Pedidos](QUEUE.md)
