<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/5
 * Time: 下午3:45
 */

namespace App\Http\Middleware;

use App\Core\Enums\ErrorCode;
use App\Exceptions\CodeException;
use App\Src\Repository\UsersRepository;
use App\Support\Sys;
use Closure;

class KongAuth
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    ];

    /**
     * The name of the query string item from the request containing the API token.
     *
     * @var string
     */
    protected $inputKey = 'token';


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
        $token = $this->getTokenForRequest($request);
        if (!$token) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_LOGIN_ERROR);
        }
        $repository = app(UsersRepository::class);

        $user = $repository->getInfoByToken($token);
        if ($user->status == Sys::USER_DISABLE) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_USER_DISABLE_ERROR);
        }
        if (!$user) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_LOGIN_ERROR);
        }
        $now = time();
        if ($user->expires_at < $now) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_LOGIN_ERROR);
        }
        return $next($request);


    }

    /**
     * Get the token for the current request.
     *
     * @return string
     */
    public function getTokenForRequest($request)
    {
        $token = $request->query($this->inputKey);

        if (empty($token)) {
            $token = $request->input($this->inputKey);
        }

        if (empty($token)) {
            $token = $request->header('TOEKN', '');
        }

        if (empty($token)) {
            $token = $request->header('TOKEN', '');
        }

        return $token;
    }
}