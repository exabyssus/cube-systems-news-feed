<?php

namespace App\Providers;

use App\Services\CacheService;
use App\Services\DataService;
use App\Services\FeedService;
use App\Services\HttpService;
use App\Services\XmlService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('limit', config('feeds.tvnet.limit') ?? 50);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CacheService', function () {
            return new CacheService;
        });

        $this->app->bind('DataService', function () {
            return new DataService;
        });

        $this->app->bind('FeedService', function () {
            return new FeedService;
        });

        $this->app->bind('HttpService', function () {
            /** @var Client $client */
            $client = new Client;
            return new HttpService($client);
        });

        $this->app->bind('XmlService', function () {
            return new XmlService;
        });
    }
}
