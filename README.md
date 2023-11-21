# PHP-Betaseries-API

## Betaseries API client

## :warning: In progress
The package is not available on packagist at the moment.  
Only one endpoint is currently implemented, and is not finished yet.

### Requirements

- PHP 8.2
- An [API key](https://www.betaseries.com/en/api/)

### Installation

```shell
composer require rtransat/betaseries-api
```

This package uses [php-http/discovery](https://github.com/php-http/discovery), so you need to add an http client (of your choice) following PSR-18.  
For example, you can install [Guzzle](https://github.com/guzzle/guzzle)

```shell
composer require guzzlehttp/guzzle
```

### Usage

```php
use Rtransat\Betaseries\Api\Params\Shows\DisplayParams;
use Rtransat\Betaseries\Client;

$client = new Client("your_api_key");
$show = $client->shows()->display(new DisplayParams(id: 1161));
```
