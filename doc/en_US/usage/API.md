# Using the API

The API class used in the SDK is the needed proxy class to have access to any other API functionality. It's usage is very simple.

First, you need to import the composer autoload in your php file:

```php
<?php
    
    require_once './vendor/autoload.php';
    
    // ...
```

After that, you can instantiate a new API class:

```php
<?php
    
    require_once './vendor/autoload.php';
    
    $email   = 'teste.sdk@skyhub.com.br';
    $apiKey  = 'ddRTGUrf_bho17FooTjC';

    /** @var \SkyHub\Api $api */
    $api = new SkyHub\Api($email, $apiKey);
```

Doing this, you will be allowed to use any integration functionality.

[Back](../../../README.en_US.md)

[Continue: Catalog](CATALOG.md)
