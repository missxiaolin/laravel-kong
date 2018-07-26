<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午2:47
 */

namespace App\Http\Middleware;

use App\Support\Sys;
use Closure;
use Illuminate\Routing\Route;

class RbacMiddleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    ];

    public function handle($request, Closure $next)
    {
        $user = app('kong.user');
        if ($user->type !== Sys::ADMIN_USER_SUPER_TYPE) {
            $uri = $request->route()->uri;
        }
        return $next($request);
    }
}