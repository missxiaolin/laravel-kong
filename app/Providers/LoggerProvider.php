<?php

namespace App\Providers;

use App\Support\Logger\Factory;
use App\Support\Logger\Local;
use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

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

        $this->app->bind('logger_sql', function () {
            $monolog = new Logger('debug');
            $log_level = Logger::DEBUG;

            $log_path = storage_path('logs') . '/' . str_replace('logger_', '', 'sql') . '.log';

            $handler = new RotatingFileHandler($log_path, 5, $log_level, true, 0777);
            //$handler->setFilenameFormat('{filename}-{date}-'.date('H'), 'Y-m-d');
            $monolog->pushHandler($handler);
            $formatter = new LineFormatter(null, null, true, true);
            $handler->setFormatter($formatter);

            return $monolog;
        });
    }

}
