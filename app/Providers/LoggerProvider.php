<?php

namespace App\Providers;

use App\Support\Logger\Factory;
use App\Support\Logger\Local;
use Illuminate\Support\ServiceProvider;

class LoggerProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLoggerDebug();
    }

    /**
     * 调试日志记录器
     */
    public function registerLoggerDebug()
    {
        
        $this->app->bind('logger_local', function () {
            return new Local();
        });

        $this->app->bind('logger_factory', function () {
            return new Factory();
        });
    }

}
