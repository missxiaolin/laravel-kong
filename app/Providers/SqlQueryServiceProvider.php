<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Events\QueryExecuted;

class SqlQueryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $env = env('APP_ENV');
        $debug = env('SQL_DEBUG', false);
        if ($debug && in_array($env, ['local', 'prd'])) {
            \DB::listen(function (QueryExecuted $query) {
                $tmp = str_replace('?', '"' . '%s' . '"', $query->sql);
                $tmp = vsprintf($tmp, $query->bindings);
                $tmp = str_replace("\\", "", $tmp);
                $data = [
                    'name' => $query->connectionName,
                    'time' => $query->time,
                    'sql' => $tmp,
                ];
                $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                app('logger_sql')->debug($json);
            });
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
