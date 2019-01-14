# Atributos de Produto

Para integrar seus produtos, primeiramente você precisa integrar os atributos que compõem seus produtos.

### Criando Atributos

Para criar um atributo de produto:

```php
// ...

/** @var SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler $requestHandler */
$requestHandler = $api->productAttribute();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->create('color', 'Color', [
    'Blue',
    'White'
]);

// ...
```

### Atualizando Atributos

Quando o atributo já existe na SkyHub e você precisa atualizá-lo:

```php
// ...

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

// ...
```

Para mais informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/attributes).

[Voltar](../../../../README.md)

[Continuar: Produtos](PRODUCTS.md)
