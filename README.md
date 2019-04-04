# laravel-kong

## kong简介

Kong 是在客户端和（微）服务间转发API通信的API网关，通过插件扩展功能。Kong 有两个主要组件：
Kong Server ：基于 openresty 的服务器，用来接收 API 请求。
Apache Cassandra或者PG ：用来存储操作数据。
你可以通过增加更多 Kong Server 机器对 Kong 服务进行水平扩展，通过前置的负载均衡器向这些机器分发请求。根据文档描述，两个Cassandra节点就足以支撑绝大多数情况，但如果网络非常拥挤，可以考虑适当增加更多节点。
对于开源社区来说，Kong 中最诱人的一个特性是可以通过插件扩展已有功能，这些插件在 API 请求响应循环的生命周期中被执行。插件使用 Lua 编写，而且 Kong 还有如下几个基础功能：HTTP 基本认证、密钥认证、CORS（ Cross-origin Resource Sharing，跨域资源共享）、TCP、UDP、文件日志、API 请求限流、请求转发以及 nginx 监控。
Kong包可运行在某些 Linux 发行版、Mac OS X 和 Docker 中，无论是本地机还是云端服务器皆可运行。
除了免费的开源版本，Mashape 还提供了付费的企业版，其中包括技术支持、使用培训服务以及 API 分析插件。

### kong 安装

#### 安装过程

因为现场网络不通在家里测试环境安装好save下，在现场load使用即可。使用了export和import装载是报错，因为安装时也没有进行其他配置，索性使用save进行拷贝。

~~~
docker save -o kong-database-postgres-docker-9.4.tar.gz docker.io/postgres
docker save -o kong.tar.gz docker.io/kong

docker load -i kong-database-postgres-docker-9.4.tar.gz
docker load -i kong.tar.gz
~~~

#### 安装kong

~~~
[slview@DEMO:~]$ docker search  kong
INDEX       NAME                                DESCRIPTION                                     STARS     OFFICIAL   AUTOMATED
docker.io   docker.io/kong                      Open-source Microservice & API Management ...   73        [OK]       
docker.io   docker.io/pgbi/kong-dashboard       Web UI for managing your Kong setup.            14                   [OK]
docker.io   docker.io/pantsel/konga             More than just another GUI to KONG Admin API.   3                    [OK]
docker.io   docker.io/articulate/kong-wait      Waits for Cassandra to be connectable befo...   1                    [OK]
docker.io   docker.io/galacticfog/kong          A fork mashape/kong, with a bias towards p...   1                    [OK]
docker.io   docker.io/littlebaydigital/kong     Extension of official docker kong image wi...   1                    [OK]
docker.io   docker.io/mesoshq/kong              Run Kong clusters on Mesos/Marathon!            1                    [OK]
docker.io   docker.io/wmzhong/docker-kong       For adding solutions for clustering...          1                    [OK]
docker.io   docker.io/anduin/kong               kong                                            0                    [OK]
docker.io   docker.io/articulate/kong-monit     Adds monit to the base kong image.              0                    [OK]
docker.io   docker.io/bakstad/kong              Extension of the official Docker image for...   0                    [OK]
docker.io   docker.io/cknowles/kong             Fork of official repo to ensure logs work ...   0                    [OK]
docker.io   docker.io/dasudian/kong             Build kong docker image.                        0                    [OK]
docker.io   docker.io/derdiedasjojo/kong        kong with piwik-log plugin                      0                    [OK]
docker.io   docker.io/derdiedasjojo/kong-conf   create an api in kong by making an api-call     0                    [OK]
docker.io   docker.io/koudaiii/kong             docker-kong                                     0                    [OK]
docker.io   docker.io/misfit/kong               Kong in Docker                                  0                    [OK]
docker.io   docker.io/mrsaints/kong-aws         An extension of Kong with a plugin that ca...   0                    [OK]
docker.io   docker.io/mrsaints/kong-dev         A test / development sandbox for Kong, a s...   0                    [OK]
docker.io   docker.io/sikmi/nendo-docker-kong   nendo kong                                      0                    [OK]
docker.io   docker.io/sneck/kong                Kong(Open-Source API Management and Micros...   0                    [OK]
docker.io   docker.io/supermp/kong              Kong                                            0                    [OK]
docker.io   docker.io/vikingco/kong             Microservice & API Management Layer (https...   0                    [OK]
docker.io   docker.io/vikingco/kong-admin       Standalone Kong Admin Service                   0                    [OK]
docker.io   docker.io/zymbit/kong               Mashape Kong                                    0                    [OK]
[slview@DEMO:~]$ 
[slview@DEMO:~]$ 
[slview@DEMO:~]$ 
[slview@DEMO:~]$ 
[slview@DEMO:~]$ docker pull  kong:0.10
Trying to pull repository 192.168.5.249:5000/kong ... 
Pulling repository 192.168.5.249:5000/kong
Trying to pull repository docker.io/library/kong ... 
sha256:ff6dd0495f1a5b312bff9fd42f6aee6437200a337e190eb0ddc8e5ca83482995: Pulling from docker.io/library/kong
343b09361036: Pull complete 
eb953d76e90b: Pull complete 
ebdf6ecbe509: Pull complete 
24f20231ced9: Pull complete 
Digest: sha256:ff6dd0495f1a5b312bff9fd42f6aee6437200a337e190eb0ddc8e5ca83482995
Status: Downloaded newer image for docker.io/kong:0.10

~~~

#### 安装PG

~~~
[slview@DEMO:~]$ docker search postgres
INDEX       NAME                                DESCRIPTION                                     STARS     OFFICIAL   AUTOMATED
docker.io   docker.io/postgres                  The PostgreSQL object-relational database ...   3552      [OK]       
docker.io   docker.io/kiasaki/alpine-postgres   PostgreSQL docker image based on Alpine Linux   30                   [OK]
docker.io   docker.io/abevoelker/postgres       Postgres 9.3 + WAL-E + PL/V8 and PL/Python...   10                   [OK]
docker.io   docker.io/macadmins/postgres        Postgres that accepts remote connections b...   8                    [OK]
docker.io   docker.io/jamesbrink/postgres       Highly configurable PostgreSQL container.       5                    [OK]
docker.io   docker.io/eeacms/postgres           Docker image for PostgreSQL (RelStorage re...   4                    [OK]
docker.io   docker.io/blacklabelops/postgres    Postgres Image for Atlassian Applications       3                    [OK]
docker.io   docker.io/azukiapp/postgres         Docker image to run PostgreSQL by Azuki - ...   2                    [OK]
docker.io   docker.io/clkao/postgres-plv8       Docker image for running PLV8 1.4 on Postg...   2                    [OK]
docker.io   docker.io/publysher/postgres-s3     A Docker-based solution for Postgres backu...   2                    [OK]
docker.io   docker.io/2020ip/postgres           Docker image for PostgreSQL with PLV8           1                    [OK]
docker.io   docker.io/eccube/postgres           Docker image for PostgreSQL extended local...   1                    [OK]
docker.io   docker.io/steenzout/postgres        Steenzout's docker image packaging for Pos...   1                    [OK]
docker.io   docker.io/1maa/postgres             PostgreSQL base image                           0                    [OK]
docker.io   docker.io/beorc/postgres            Ubuntu-based PostgreSQL server                  0                    [OK]
docker.io   docker.io/camptocamp/postgres       Docker image for PostgreSQL including some...   0                    [OK]
docker.io   docker.io/coreroller/postgres       official postgres:9.4 image but it adds 2 ...   0                    [OK]
docker.io   docker.io/debezium/postgres         PostgreSQL for use with Debezium change da...   0                    [OK]
docker.io   docker.io/examus/postgres           Postgres with change password                   0                    [OK]
docker.io   docker.io/kobotoolbox/postgres      Postgres image for KoBo Toolbox.                0                    [OK]
docker.io   docker.io/opencog/postgres          This is a configured postgres database for...   0                    [OK]
docker.io   docker.io/studionone/postgres       Postgres Docker image with postgres uuid-o...   0                    [OK]
docker.io   docker.io/timbira/postgres          Postgres  containers                            0                    [OK]
docker.io   docker.io/travix/postgres           A container to run the PostgreSQL database.     0                    [OK]
docker.io   docker.io/vrtsystems/postgres       PostgreSQL image with added init hooks, bu...   0                    [OK]
[slview@DEMO:~]$ 
[slview@DEMO:~]$ 
[slview@DEMO:~]$ 
[slview@DEMO:~]$ docker pull  postgres:9.4
Trying to pull repository 192.168.5.249:5000/postgres ... 
Pulling repository 192.168.5.249:5000/postgres
Trying to pull repository docker.io/library/postgres ... 
sha256:8988064772fc8a39f0be47f7f2557788559221b27a51cbba595f23868edbc426: Pulling from docker.io/library/postgres
10a267c67f42: Pull complete 
e9a920522e33: Pull complete 
6888e696bd71: Pull complete 
798096eed143: Pull complete 
fb58419959b5: Pull complete 
97f9ec09cb68: Pull complete 
94972b6e82a0: Pull complete 
a281bad165d7: Pull complete 
080dd452e4af: Pull complete 
e04973558177: Pull complete 
79155f9ed5e1: Pull complete 
010432309d6c: Pull complete 
d1d8761b1fae: Pull complete 
Digest: sha256:8988064772fc8a39f0be47f7f2557788559221b27a51cbba595f23868edbc426
Status: Downloaded newer image for docker.io/postgres:9.4
~~~

#### 安装后启动

1、启动pg

~~~
docker run -d --name kong-database \
                -p 5432:5432 \
                -e "POSTGRES_USER=kong" \
                -e "POSTGRES_DB=kong" \
                postgres:9.4
~~~

2、启动kong

~~~
docker run -d --name kong \
    --link kong-database:kong-database \
    -e "KONG_DATABASE=postgres" \
    -e "KONG_CASSANDRA_CONTACT_POINTS=kong-database" \
    -e "KONG_PG_HOST=kong-database" \
    -p 8000:8000 \
    -p 8443:8443 \
    -p 8001:8001 \
    -p 7946:7946 \
    -p 7946:7946/udp \
    kong:0.10
~~~

### go rpc

[goRpc连接](https://github.com/missxiaolin/go-rpc)

### elk

[日志服务](https://github.com/missxiaolin/laravel-elk)

### 机器学习

[链接](https://github.com/missxiaolin/laravel-swoole-ml)

### kong官网

[Kong 官网](https://konghq.com/install/)

- 前端项目地址：[vue-kong](https://github.com/missxiaolin/vue-kong)
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
<?php
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