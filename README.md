# laravel-kong

### go rpc

[goRpc连接](https://github.com/missxiaolin/go-rpc)

### elk

[日志服务](https://github.com/missxiaolin/laravel-elk)

### 机器学习

[链接](https://github.com/missxiaolin/laravel-swoole-ml)

### kong官网

[Kong 官网](https://konghq.com/install/)

- [前端vue-kong](https://github.com/missxiaolin/vue-kong)
- [效果展示](http://admin.missxiaolin.com/)

测试账号：13758735533    123456

### 数据库

~~~
database/sql/kong.sql
或
php artisan migrate 
~~~

### laravel-swoole 分之

需要安装swoole扩展，以swoole-http-server 为基础

~~~
php artisan swoole:http start
~~~

### 跨域解决

- 方案1

安装以下扩展

~~~
https://github.com/barryvdh/laravel-cors
~~~

- 方案2

返回jason信息带上header头信息

~~~
if (!function_exists('api_response')) {

    /**
     * json返回
     * @param $data
     * @param string $code
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    function api_response($data, $code = '0', $msg = 'ok')
    {
        $json = [
            'data' => $data,
            'code' => $code,
            'message' => $msg,
            'time' => (string)time(),
            '_ut' => (string)round(microtime(TRUE) - $_SERVER['REQUEST_TIME_FLOAT'], 5),
        ];

        $headers = implode(',', config('domain.request.headers'));

        return response()->json($json)->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Headers', $headers);

        return response()->json($json);
    }
}
~~~

- 方案3

注册中间件app/Http/Middleware/ApiResponseMiddleware.php

~~~
/** @var Response $response */
        $response = $next($request);

        // Perform action
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', 'TOKEN');
        $response->header('Access-Control-Allow-Methods', 'POST,PUT,GET,UPDATE,OPTIONS');

        return $response;
~~~

- 方案4

Nginx上解决跨域

~~~
location ~ .*\.(text|xml) $ {
    add_header Access-Control-Allow-Credentials true;
    add_header Access-Control-Allow-Methods GET,POST;
    add_header Access-Control-Allow-Origin *;
    add_header Access-Control-Allow-Headers *;
    access_log  /usr/local/var/log/nginx/access.log;
}
~~~