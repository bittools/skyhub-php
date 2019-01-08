# SDK Installation

This SDK follow the PSR standards and must be installed via composer because of its dependencies.

To install this SDK você can follow the steps below:

##### Installation Steps

It's required to have the [composer](https://getcomposer.org/download/) installed on the machine where the SDK will be used.

```bash
# Install Composer
$ curl -sS https://getcomposer.org/installer | php 
```

The next step is to execute composer to obtain all the required dependencies and their correct versions:

```bash
$ php composer.phar require bittools/skyhub-php
```

If you already have the composer installed:

```bash
$ composer require bittools/skyhub-php
```

After the installation, you need to require (import) the composer autoload file in you PHP script:

```php
require_once 'vendor/autoload.php';
```

Afterwards, you may want to update your composer version to get the most updated version of composer application. To do so run the following command:

```bash
$ php composer.phar update
```

[Back](../README.md)

[Continue: Using the SDK - API](usage/API.md)
