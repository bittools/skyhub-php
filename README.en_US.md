![SkyHub - MarketPlace Intelligence](/doc/images/logo.png)

# SkyHub - PHP SDK

This is the official SDK ([Software Developmen Kit](https://pt.wikipedia.org/wiki/Kit_de_desenvolvimento_de_software)) from SkyHub, built in PHP, which you can use to integrate your platform to our system.

See right below how easy is to use it:

```php
<?php

    /**
     * First you need to require the composer autoload file into your script.
     */ 
    require_once './vendor/autoload.php';

    /**
     * These credentials you must request to SkyHub Support team.
     */ 
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
1. [System Requirements](doc/en_US/SYSTEM_REQUIREMENTS.md)
1. [Credentials](doc/en_US/CREDENTIALS.md) 
1. [Installation and Setup](doc/en_US/INSTALLATION.md)
1. Using the SDK
    1. [Using the API](doc/en_US/usage/API.md)
    1. [Catalog](doc/en_US/usage/CATALOG.md)
        1. [Product Attributes](doc/en_US/usage/catalog/ATTRIBUTES.md)
        1. [Products](doc/en_US/usage/catalog/PRODUCTS.md)
        1. [Categories](doc/en_US/usage/catalog/CATEGORIES.md)
    1. [Orders](doc/en_US/usage/ORDERS.md)
        1. [Consulting Orders](doc/en_US/usage/orders/CONSULT.md)
        1. [Working With Order Queues](doc/en_US/usage/orders/QUEUE.md)
        1. [Invoicing an Order](doc/en_US/usage/orders/INVOICE.md)
        1. [Canceling an Order](doc/en_US/usage/orders/CANCEL.md)
        1. [Adding an Order Tracking Number](doc/en_US/usage/orders/TRACKING.md)
        1. [Setting an Order as Delivered](doc/en_US/usage/orders/DELIVERY.md)
        1. [Getting Order Tags](doc/en_US/usage/orders/LABELS.md)
        1. [Orders With Shipment Issues (Exceptions)](doc/en_US/usage/orders/SHIPPING_EXCEPTION.md)
    1. [Shipment](doc/en_US/usage/SHIPMENT.md)
        1. [PLP](doc/en_US/usage/shipment/PLPS.md)
     
## Contributing with the code

Your contribution is always welcome! Please read the [contribution documentation](doc/CONTRIBUTING.md).

## Authors

Tiago Sampaio

Bruno Gemelli

## Support

For support requests please send an e-mail to the following address:

sdk@e-smart.com.br

#### Read in Another Language

* [Português do Brasil](README.md)

## Licence
> SkyHub PHP SDK is a project started into B2W Digital office and distributed as an Open Source Software in March of 2018.

The code base in this distribution is licenced under OSL 3.0.

[The Open Software License 3.0 (OSL-3.0)](https://opensource.org/licenses/osl-3.0.php).

For complete licence information please read LICENSE.txt or contact sdk@e-smart.com.br to request a copy of it.
