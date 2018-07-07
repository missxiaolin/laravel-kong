### 用户接口

#### 错误信息
~~~
{
    "data": [],
    "code": 1003,
    "message": "xxx",
    "time": "1530779733",
    "_ut": "0.01027"
}
~~~

#### 返回成功

~~~
{
    "data": [],
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 服务列表
实例:/kong/service/add
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>name</td>
        <td>服务名称</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>url</td>
        <td>域名</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>protocol</td>
        <td>用于与上游通信的协议。它可以是http（默认）或https。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>port</td>
        <td>上游服务器端口。默认为80。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>path</td>
        <td>在上游服务器的请求中使用的路径。默认为空。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>retries</td>
        <td>代理失败时要执行的重试次数。默认是5。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>connect_timeout</td>
        <td>建立与上游服务器的连接的超时时间（以毫秒为单位）。默认为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>write_timeout</td>
        <td>用于向上游服务器发送请求的两次连续写操作之间的超时（以毫秒为单位）。默认为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>read_timeout</td>
        <td>用于向上游服务器发送请求的两次连续读取操作之间的超时（以毫秒为单位）。默认为60000。</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "host": "kong.missxiaolin.com",
        "created_at": 1530927038,
        "connect_timeout": 60000,
        "id": "92a9d3b5-6ebc-472c-b938-6e6c58288dde",
        "protocol": "http",
        "name": "ac221",
        "read_timeout": 60000,
        "port": 80,
        "path": null,
        "updated_at": 1530927038,
        "retries": 5,
        "write_timeout": 60000
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 服务列表
实例:/kong/service/lists
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>offset</td>
        <td>用于分页的游标。offset是一个对象标识符，用于定义列表中的位置。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>size</td>
        <td>每页返回的对象数限制。默认为100最大为1000</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": [
        {
            "host": "kong.missxiaolin.com",
            "created_at": 1530595589,
            "connect_timeout": 60000,
            "id": "343dafad-5201-4e3f-8c82-a96bb8edafac",
            "protocol": "http",
            "name": "demo",
            "read_timeout": 60000,
            "port": 80,
            "path": null,
            "updated_at": 1530595589,
            "retries": 5,
            "write_timeout": 60000
        }
    ],
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 服务详情
实例:/kong/service/info
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>服务Id</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        "host": "kong.missxiaolin.com",
        "created_at": 1530927005,
        "connect_timeout": 60000,
        "id": "0e6ee85b-f794-4add-8531-3e8d6e97ac4e",
        "protocol": "http",
        "name": "ac231",
        "read_timeout": 60000,
        "port": 80,
        "path": null,
        "updated_at": 1530927005,
        "retries": 5,
        "write_timeout": 60000
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~