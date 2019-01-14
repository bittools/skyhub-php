# Trabalhando com Filas de Pedidos

A fila de pedidos é de onde você precisa 

### Obtendo o Próximo Pedido da Fila de Pedidos

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\Order\QueueHandler $requestHandler */
$requestHandler = $api->queue();

/** @var \SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->orders();

// ...
```

### Removendo um Pedido da Fila

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Sales\Order\QueueHandler $requestHandler */
$requestHandler = $api->queue();

$orderId = 'Marketplace-000000001';

/** @var \SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delete($orderId);

// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/queues).

[Voltar](../../../../README.md)

[Continuar: Faturando um Pedido](INVOICE.md)
