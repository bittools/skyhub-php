# Instalação da SDK

Esta SDK segue os padrões PSR e utiliza o composer para a instalação de todas as suas dependências.
Para instalar esta SDK você pode seguir os seguintes passos:

##### Passos para a instalação

É necessário ter o [composer](https://getcomposer.org/download/) instalado no ambiente no qual a SDK será utilizada.

```bash
# Install Composer
$ curl -sS https://getcomposer.org/installer | php 
```

O próximo passo é executar o composer para que todas as dependências, com suas versões corretas, sejam instaladas:

```bash
$ php composer.phar require bittools/skyhub-php
```

Ou, caso você já tenha o composer instalado:

```bash
$ composer require bittools/skyhub-php
```

Após a instalação, você precisa colocar uma chamada do autoload do Composer no seu arquivo PHP:

```php
require_once 'vendor/autoload.php';
```

Posteriormente, pode ser necessário fazer a atualização da SDK no seu ambiente. Para isso você poderá executar o seguinte comando:

```bash
$ php composer.phar update
```

[Voltar](../../README.md)

[Continuar: Utilizando a SDK - API](usage/API.md)
