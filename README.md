![SkyHub - MarketPlace Intelligence](/doc/images/logo.png)

# SkyHub - PHP SDK

[![Build Status](https://travis-ci.org/bittools/skyhub-php.svg?branch=1.1-develop)](https://travis-ci.org/bittools/skyhub-php)

Esta é a SDK ([Software Developmen Kit](https://pt.wikipedia.org/wiki/Kit_de_desenvolvimento_de_software)) oficial da SkyHub, construída em PHP, que você pode utilizar para integrar sua plataforma aos nossos serviços.

Veja um exemplo de como é fácil utilizar:

```php
<?php

    require_once './vendor/autoload.php';

    $email   = 'teste.sdk@skyhub.com.br';
    $apiKey  = 'ddRTGUrf_bho17FooTjC';

    /** @var \SkyHub\Api $api */
    $api = new SkyHub\Api($email, $apiKey);
    
    /** @var \SkyHub\Api\Handler\Request\Catalog\Product\AttributeHandler $requestHandler */
    $requestHandler = $api->productAttribute();
    
    /**
     * Create an Attribute
     * @var SkyHub\Api\Handler\Response\HandlerInterface $response
     */
    $response = $requestHandler->create('color', 'Color', [
        'Blue',
        'White',
        'Green',
        'Yellow'
    ]);
    
    if ($response->success()) {
        echo 'SUCCESS!';
    }
```

## Wiki
1. [Requisitos do Sistema](doc/SYSTEM_REQUIREMENTS.md)
1. [Credenciais](doc/CREDENTIALS.md) 
1. [Instalação e Setup](doc/INSTALLATION.md)
1. Utilizando a SDK
    1. [Utilizando a API](doc/usage/API.md)
    1. [Catálogo](doc/usage/CATALOG.md)
        1. [Atributos de Produto](doc/usage/catalog/ATTRIBUTES.md)
        1. [Produtos](doc/usage/catalog/PRODUCTS.md)
        1. [Categorias](doc/usage/catalog/CATEGORIES.md)
    1. [Pedidos](doc/usage/ORDERS.md)
        1. [Consultando Pedidos](doc/usage/orders/CONSULT.md)
        1. [Consultando Pedidos](doc/usage/orders/CONSULT.md)
        1. [Trabalhando com Filas de Pedidos](doc/usage/orders/QUEUE.md)
        1. [Faturando um Pedido](doc/usage/orders/INVOICE.md)
        1. [Cancelando um Pedido](doc/usage/orders/CANCEL.md)
        1. [Adicionando um Tracking de Pedido](doc/usage/orders/TRACKING.md)
        1. [Confirmar Entrega de um Pedido](doc/usage/orders/DELIVERY.md)
        1. [Obtendo Etiquetas de Pedidos](doc/usage/orders/LABELS.md)
        1. [Pedidos com Problemas de Entrega](doc/usage/orders/SHIPPING_EXCEPTION.md)
    1. [Postagem](doc/usage/SHIPMENT.md)
        1. [PLP](doc/usage/shipment/PLPS.md)
     
## Contribuindo com o Código

Sua contribuição é sempre bem-vinda! Por favor, leia a [documentação](doc/CONTRIBUTING.md) de contribuição de código.

## Autores

Tiago Sampaio

Bruno Gemelli

## Suporte

Para solicitações de suporte, por favor, envie um e-mail para o seguinte endereço:

sdk@e-smart.com.br

## Licença
> SkyHub PHP SDK é um projeto iniciado nos escritórios da B2W e disponibilizado como software Open Source em Março de 2018.

O código fonte incluso nesta distribuição está licenciado sob o OSL 3.0.

[The Open Software License 3.0 (OSL-3.0)](https://opensource.org/licenses/osl-3.0.php).

Por favor, veja o arquivo LICENSE.txt para ler o texto completo da licença OSL 3.0 ou entre em contato com sdk@e-smart.com.br para obter uma cópia.
