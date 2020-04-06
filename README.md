# laravel-cacheserver
Use ODBC to connect with your Cache instances from Laravel 5+.

Disclaimer: all Bash commands you will see here are examples for RHEL/CentOS Yum package manager. 
If you would like to help make these docs more friendly with other distros, please make sure to either submit a pull request on the README or open an issue with additional commands specifying which distro you are using and I'll then update the README docs.

## Dependencies

### Intersystem Cache Driver
You can find specific instructions for your distro here: https://download.intersystems.com/download/login.csp

## Package Installation

Install with composer
```bash
composer require marquardtkuechen/laravel-cacheconnector:dev-master
```

Add the Service Provider to config/app.php
```php
MarquardtKuechen\CacheServer\CacheServerServiceProvider::class
```

Make sure to update your config/database.php file

```php
'domdb' => [
            'driver'        => 'odbc',
            'odbc_driver'   => '{InterSystems ODBC}',
            'host'          => env('DB_HOST', 'localhost'),
            'database'      => env('DB_DATABASE', 'sample'),
            'username'      => env('DB_USERNAME', 'sample'),
            'password'      => env('DB_PASSWORD', ''),
            'port'          => env('DB_PORT', '1972')            
        ],
```

**IMPORTANT NOTES:** 
- `driver` should be set to `odbc`. 
- `odbc_driver` should be the name of the ODBC Driver as it appears in your windows ODBC Data Source APP or on Linux in `/etc/odbcinst.ini`.

- For the ODBC Driver **MAKE SURE TO REPLACE THE SQUARE BRACKETS ([]) WITH CURLY BRACES ({}) IN** `config/database.php`
- You must use the `host`, `database`, `username`, `password`, `port` properties to properly setup the DSN string for the ODBC Connection
- **NOTE:** the `Address`, `Addr`, `Database`, `Server`, `UID`, `PWD`, `Network`, `Net`, `DSN` and `Database` properties cannot be used here and will be ignored as they are already specified the Laravel way 
