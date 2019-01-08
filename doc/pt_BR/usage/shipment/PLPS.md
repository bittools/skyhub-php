# Postagem

Se a sua integração entre a SkyHub e o marketplace B2W é realizada através de API e você utiliza B2W Entrega, você pode agrupar seus pedidos à uma só PLP dos Correios.


### Obter uma Lista de PLPs

Você pode obter uma lista de PLPs utilizando o trecho de código abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->plps();

// ...
```


### Obter a Lista de Pedidos Aptos ao Agrupamento

Você pode obter uma lista de pedidos aptos a serem agrupados em uma PLP utilizando o trecho de código abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->ordersReadyToGroup();

// ...
```


### Agrupar Pedidos em uma PLP

Você pode agrupar os pedidos em uma PLP utilizando o trecho de código abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

$orders = array(
    'CODIGO_PEDIDO_001',
    'CODIGO_PEDIDO_002'
);

/**
 * CREATE A PLP WITH ORDERS
 *
 * @var SkyHub\Api\Handler\Response\HandlerInterface $response
 */
$response = $requestHandler->group($orders);

// ...
```


### Desagrupar uma PLP

Você pode desagrupar uma PLP utilizando o trecho de código abaixo:

```php
// ...

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->ungroup('PLP_ID');

// ...
```


### Recuperar PLP 

Você pode obter o PDF de sua PLP utilizando o trecho de código abaixo:

```php
// ...

/** @var SkyHub\Api\ $service */
$service = new SkyHub\Api\Service\ServicePdf(null);

/** @var \SkyHub\Api $api */
$api = new SkyHub\Api($email, $apiKey, null, null, $service);

/** @var \SkyHub\Api\Handler\Request\Shipment\PlpHandler $requestHandler */
$requestHandler = $api->plp();

/** @var SkyHub\Api\Handler\Response\HandlerInterface $response */
$response = $requestHandler->viewFile('PLP_ID');

// ...
```


Para mais informações acesse a [documentação oficial](https://skyhub.gelato.io/docs/versions/1.0/resources/postagem-plp).

[Voltar](../../../README.md)

