<?php

namespace App\Providers;

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('elasticsearch', function () {

        $host = config('elasticsearch.host');
        $username = config('elasticsearch.username');
        $password = config('elasticsearch.password');
        $verify = config('elasticsearch.ssl_verification');

        return ClientBuilder::create()
            ->setHosts([$host])
            ->setBasicAuthentication($username, $password)
            ->setSSLVerification($verify)
            ->build();
    });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
