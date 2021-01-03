# PHP Storage Jsons SDK

## Install

```sh
composer require arpanext/php-storage-jsons-sdk
```

## Usage

```php
namespace Arpanext\Storage\Jsons\Client;

$client = (new Client([
    'base_uri' => 'http://127.0.0.1:8000/api/v1/storage/jsons/',
    'headers' => [
        //
    ]
]));

$response = $client->databases('database')->commands()->execute('{"ping":1}')->request();

$response = $client->databases('database')->collections('collection')->findOne('{"id":1,"name":"Leanne Graham","email":"Sincere@april.biz"}', '{"sort":{"_id":-1}}')->request();
```

## Testing

Run the tests with:

```bash
vendor/bin/phpunit vendor/arpanext/php-storage-jsons-sdk
```

or

```
vendor/bin/phpunit vendor/arpanext/php-storage-jsons-sdk --configuration=vendor/arpanext/php-storage-jsons-sdk/phpunit.xml --do-not-cache-result --coverage-html coverage-html/php-storage-jsons-sdk
```
