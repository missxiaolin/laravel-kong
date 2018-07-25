<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/25
 * Time: 下午8:45
 */

namespace App\Http\Middleware;

use Closure;
use  Illuminate\Http\Response;

class ApiResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        // Perform action
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', 'TOKEN');
        $response->header('Access-Control-Allow-Methods', 'POST,PUT,GET,UPDATE,OPTIONS');

        return $response;

    }
}