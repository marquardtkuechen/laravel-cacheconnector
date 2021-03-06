<?php
/**
 * Created by PhpStorm.
 * User: christian.soseman
 * Date: 6/24/2017
 * Time: 12:39 AM
 */

namespace MarquardtKuechen\CacheServer;


use Illuminate\Support\ServiceProvider;

class CacheServerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // https://stackoverflow.com/questions/42583366/using-laravel-service-provider-to-override-connector-classes
        $this->app->bind('db.connector.odbc', CacheServerConnector::class);
    }
}
