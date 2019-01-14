# SDK installation

This SDK follow the PSR patterns and uses composer to install all dependencies.

To install this SDK you need to follow these steps:

##### Steps to install

It's necessary to have [composer](https://getcomposer.org/download/) installed. 

```bash
# Install Composer
$ curl -sS https://getcomposer.org/installer | php 
```

Next step is to execute composer to get all dependencies in it's correct versions: 

```bash
$ php composer.phar require bittools/skyhub-php
```

Or, in case you already have composer installed:

```bash
$ composer require bittools/skyhub-php
```

After installation, you need to call composer's autoload in your php file:

```php
require_once 'vendor/autoload.php';
```

After that, it can be necessary to update the SDK in your enviroment. To do that you can execute the following command: 

```bash
$ php composer.phar update
```

[Back](../../README.en_US.md)

[Continue: Using the SDK - API](usage/API.md)
