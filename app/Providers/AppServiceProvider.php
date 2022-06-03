<?php

namespace App\Providers;

use App\Repository\ProjectRepository;
use App\Repository\Repository;
use App\Services\DocUploadService;
use App\Services\ImageUploadService;
use Dotenv\Repository\Adapter\ReplacingWriter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ImageUploadService::class, function ($app) {
            return new ImageUploadService();
        });

        $this->app->singleton(DocUploadService::class, function ($app) {
            return new DocUploadService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
