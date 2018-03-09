# Atributos de Produto

Para integrar seus produtos, primeiramente você precisa integrar os atributos que compõem seus produtos.

Para criar um atributo de produto:

```php
/** @var SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler $requestHandler */
$requestHandler = $api->productAttribute();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->create('color', 'Color', [
    'Blue',
    'White'
]);
```

Para atualizar um atributo que já existe:

```php
/** @var SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler $requestHandler */
$requestHandler = $api->productAttribute();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->update('color', 'Color', [
    'Blue',
    'White',
    'Green',
    'Yellow',
    'Black',
    'Red'
]);
```

[Voltar](../../../README.md)

[Continuar: Produtos](PRODUCTS.md)
