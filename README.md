# laravel-ts3-php-framework
[planetteamspeak/ts3-php-framework](https://github.com/planetteamspeak/ts3phpframework) integration for Laravel 9.0 and higher

**INFO:** This package uses a singleton to access a **single** `TeamSpeak3_Adapter_Abstract|TeamSpeak3_Node_Server`.class-object. So you currently **can't access multiple TeamSpeak3 servers**!

## Supported Laravel Versions
| Laravel Version | Supported          |
|-----------------|--------------------|
| 9.0             | :heavy_check_mark: |

## Installation
This package will be autodiscovered, so no further setup is needed.

```
composer require nick-strohm/laravel-ts3-php-framework
```

## Configuration
Copy configuration to config folder:

```bash
$ php artisan vendor:publish --provider=NickStrohm\laravel_ts3_php_framework\Providers\TeamspeakServiceProvider
```

Add environmental variables to your `.env`

```
TS_SERVER_HOST=127.0.0.1
TS_SERVER_PORT=9987
TS_SERVER_TIMEOUT=2
TS_QUERY_PORT=10011
TS_QUERY_USERNAME=serveradmin
TS_QUERY_PASSWORD=supersecretpassword
```

After completing all steps from above you should have a configuration file under: `config/teamspeak.php`. There you can configure some other aspects like the name of the ServerQuery.

## Example
An example for a controller to the `/clients` endpoint that lists all connected clients.

```php
Route::get('/users', function (\TeamSpeak3_Node_Server $ts) {
    $result = $ts->clientList();
    dd($result);
});
```

## Credits
Based on [Micky5991's library](https://github.com/Micky5991/laravel-ts3admin) which integrates [par0noid's ts3admin.class](https://github.com/par0noid/ts3admin.class) library