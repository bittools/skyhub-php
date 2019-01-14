# Categorias

A criação de categorias é feita de forma bem simples.

### Criando uma Categoria

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->create('category001', 'Category 001');

// ...
```

### Atualizando uma Categoria

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->update('category001', 'Updated Category 001 Name');

// ...
```

### Excluindo uma Categoria

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delete('category001');

// ...
```

### Obtendo uma Lista de Categorias

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\CategoryHandler $requestHandler */
$requestHandler = $api->category();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->categories();

// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/categories).

[Voltar](../../../../README.md)

[Continuar: Pedidos](../ORDERS.md)
