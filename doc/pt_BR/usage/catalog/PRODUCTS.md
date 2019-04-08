# Produtos

Com os atributos de produtos integrados é hora de começar a integrar os produtos do seu catálogo.

### Criando e Atualizando Produtos na SkyHub

A criação de produtos na SkyHub necessita de várias informações como SKU, Nome, Descrição, etc.

Para fazer a integração de um produto veja o exemplo abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

$sku = 'sku123';

$attributes = array(
    'sku'               => $sku,
    'name'              => 'Sample Product',
    'description'       => 'Sample Product Description',
    'status'            => 'enabled',
    'qty'               => 123,
    'price'             => 2.3458,
    'promotional_price' => 1.9876,
    'cost'              => 1.2090,
    'weight'            => 1.45,
    'height'            => 1.45,
    'width'             => 1.45,
    'length'            => 1.45,
    'brand'             => 'Nike',
    'ean'               => '01234567890',
    'nbm'               => '11234567890',
);

$images = array(
    'http://sourceimage001.jpg',
    'http://sourceimage002.jpg',
    'http://sourceimage003.jpg'
);

$categories = array(
    array(
        'code' => 'foo',
        'name' => 'Foo > Foo',
    ),
    array(
        'code' => 'bar',
        'name' => 'Bar > Bar',
    )
);

$specifications = array(
    array(
        'key'   => 'color',
        'value' => 'Black',
    ), array(
        'key'   => 'size',
        'value' => 'XL',
    ), array(
        'key'   => 'voltage',
        'value' => '220v',
    )
);

$variations = array(
    array(
        'sku'    => 'variation001',
        'qty'    => 100,
        'ean'    => '9876565',
        'images' => array(
            'http://variation-sourceimage001.jpg',
            'http://variation-sourceimage002.jpg',
            'http://variation-sourceimage003.jpg',
        ),
        'specifications' => array(
            array(
                'key'   => 'color',
                'value' => 'White'
            ),
            array(
                'key'   => 'size',
                'value' => 'S'
            ),
            array(
                'key'   => 'price',
                'value' => '2.10'
            ),
        ),
    ),
);

$variationAttributes = array(
    'color',
    'size'
);

/**
 * CREATE A PRODUCT
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $requestHandler->create(
    $sku,
    $attributes,
    $images,
    $categories,
    $specifications,
    $variations,
    $variationAttributes
);

/**
 * UPDATE A PRODUCT
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $requestHandler->update(
    $sku,
    $attributes,
    $images,
    $categories,
    $specifications,
    $variations,
    $variationAttributes
);

// ...
```

### Deletando um Produto

Para deletar um produto basta utilizar o método abaixo.

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->delete('sku123');

// ...
```

### Obter Informações de um Produto

Você pode obter as inforamções de um único produto utlizando o trecho de código abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->product('sku123');

// ...
```

### Obter uma Lista de Produtos

Você pode obter uma lista de produtos utlizando o trecho de código abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

$status = 'enabled'; //Opcional
$pagination = ['page' => 1, 'per_page' => 100]; //Opcional (valores padrão: valor mínimo page = 1; valor máximo per_page = 100)

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->products($status, $pagination);

// ...
```

### Obter as URLs dos Produtos nos MarketPlaces

Você pode obter uma lista de produtos utlizando o trecho de código abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Catalog\ProductHandler $requestHandler */
$requestHandler = $api->product();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->urls();

// ...
```

### Integrando Produtos de Forma Mais Simples

Por mais que seja uma forma simples de criar um produto, você pode utlizar a camada de `EntityInterfaces` para simplificar ainda mais a criação de um produto, diminuindo assim a possibilidade de erros na hora de montar as informações.

A primeira coisa a se fazer é preencher todas as informações necessárias.

```php
// ...

/** @var \SkyHub\Api\EntityInterface\Catalog\Product $entityInterface */
$entityInterface = $api->product()
                       ->entityInterface();
                       
$entityInterface->setSku('sku123')
        ->setName('Sample Product')
        ->setDescription('Sample Product Description')
        ->setStatus('enabled')
        ->setQty(123)
        ->setPrice(2.3458)
        ->setPromotionalPrice(1.9876)
        ->setCost(1.2090)
        ->setWeight(1.45)
        ->setHeight(1.45)
        ->setWidth(1.45)
        ->setLength(1.45)
        ->setBrand('Nike')
        ->setEan('01234567890')
        ->setNbm('11234567890')
        ->addCategory('foo', 'Foo > Foo')
        ->addCategory('bar', 'Bar > Bar')
        ->addImage('http://sourceimage001.jpg')
        ->addImage('http://sourceimage002.jpg')
        ->addImage('http://sourceimage003.jpg')
        ->addSpecification('color', 'Black')
        ->addSpecification('size', 'XL')
        ->addSpecification('voltage', '220v')
        ->addVariationAttribute('color')
        ->addVariationAttribute('size');

/** @var \SkyHub\Api\EntityInterface\Catalog\Product\Variation $variation */
$variation = $entityInterface->addVariation('variation001', 100, '9876565');
$variation->addImage('http://variation-sourceimage001.jpg')
          ->addImage('http://variation-sourceimage002.jpg')
          ->addImage('http://variation-sourceimage003.jpg')
          ->addSpecification('color', 'White')
          ->addSpecification('size', 'S');

/**
 * Create a Single Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->create();

/**
 * Update a Single Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->update();
// ...
```

Também é possível chamar os outros métodos através da `EntityInterface` de produtos.

```php
// ...

/** @var \SkyHub\Api\EntityInterface\Catalog\Product $entityInterface */
$entityInterface = $api->product()
                       ->entityInterface();
                       
$entityInterface->setSku('sku123')

/**
 * Delete a Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->delete();

/**
 * Get a Single Product
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->product();

/**
 * Get a Product MarketPlace URLs
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->urls();

// ...
```

Para o(s) método(s) abaixo não é necessário chamar nenhum setter, como no caso acima.

```php
// ...

/** @var \SkyHub\Api\EntityInterface\Catalog\Product $entityInterface */
$entityInterface = $api->product()
                       ->entityInterface();

/**
 * Retrieve a List of Products
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $entityInterface->products();

// ...
```

Para maiores informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.1/resources/products).

[Voltar](../../../../README.md)

[Continuar: Categorias](CATEGORIES.md)
