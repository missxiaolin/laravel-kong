<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午2:47
 */

namespace App\Http\Middleware;

use App\Core\Enums\ErrorCode;
use App\Exceptions\CodeException;
use App\Src\Models\Role;
use App\Support\Sys;
use Closure;
use Illuminate\Support\Facades\Redis;

class RbacMiddleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    ];

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function handle($request, Closure $next)
    {
        $user = app('kong.user');
        if ($user->type !== Sys::ADMIN_USER_SUPER_TYPE) {
            $uri = $request->route()->uri;

            $pass = false;
            /** @var Role $role */
            foreach ($user->roles ?? [] as $role) {
                $redisKey = sprintf(Sys::REDIS_KEY_ROLE_ROUTER_CACHE_KEY, $role->id);
                if (Redis::sismember($redisKey, $uri)) {
                    $pass = true;
                    break;
                }
            }
            if ($pass === false) {
                throw new CodeException(ErrorCode::$ENUM_ILLEGAL_REQUEST);
            }
        }
        return $next($request);
    }
}