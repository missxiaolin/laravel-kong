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

#### API 添加
实例:/kong/api/add
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>name</td>
        <td>api名称</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>hosts</td>
        <td>域</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>methods</td>
        <td>发送方式</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>uris</td>
        <td>匹配路径</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>upstream_url</td>
        <td>转发地址</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>strip_uri</td>
        <td>当一个匹配的URI路径prefixes API，这是从上游带前缀匹配被请求的URI。默认值为true。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>preserve_host</td>
        <td>当通过一个主机域名匹配API时，确保请求主机头被转发到上游服务。默认情况下，这是错误的，上游主机头将从配置的UnthuryURL中提取。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>retries</td>
        <td>在代理失败时执行重试的次数。默认值是5。UnSurthyLink连接超时”＝>以毫秒为单位的超时时间，以建立与上游服务的连接。默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>upstream_connect_timeout</td>
        <td>在建立与上游服务的连接时以毫秒为单位的超时时间。默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>upstream_send_timeout</td>
        <td>在两个连续写入操作之间的毫秒时间间隔，用于向上游服务发送请求的默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>upstream_read_timeout</td>
        <td>在两个连续读取操作之间的毫秒时间间隔，用于向上游服务发送请求的默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>https_only</td>
        <td>如果您希望仅通过HTTPS在适当的端口（默认为8443）服务API，则启用。默认值：false。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>http_if_terminated</td>
        <td>在执行仅HTTPS流量时，请考虑X-PROTEDD PROTO头。默认值：false。</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "created_at": 1531343625529,
        "strip_uri": true,
        "id": "dc7a2d44-4eb4-4ab6-a291-513494897f34",
        "hosts": [
            "kong.missxiaolin.com"
        ],
        "name": "xiaolin",
        "methods": [
            "GET",
            "POST"
        ],
        "http_if_terminated": false,
        "preserve_host": false,
        "upstream_url": "http://kong.missxiaolin.com",
        "uris": [
            "/demo"
        ],
        "upstream_send_timeout": 60000,
        "upstream_connect_timeout": 60000,
        "upstream_read_timeout": 60000,
        "retries": 5,
        "https_only": false
    },
    "code": 0,
    "message": "ok",
    "time": "1531314818",
    "_ut": "0.09713"
}
~~~

#### API 列表
实例:/kong/apis/lists
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
</table>

~~~
{
    "data": {
        "total": 1,
        "data": [
            {
                "created_at": 1531343625529,
                "strip_uri": true,
                "id": "dc7a2d44-4eb4-4ab6-a291-513494897f34",
                "hosts": [
                    "kong.missxiaolin.com"
                ],
                "name": "xiaolin",
                "methods": [
                    "GET",
                    "POST"
                ],
                "http_if_terminated": false,
                "https_only": false,
                "retries": 5,
                "uris": [
                    "/demo"
                ],
                "preserve_host": false,
                "upstream_connect_timeout": 60000,
                "upstream_read_timeout": 60000,
                "upstream_send_timeout": 60000,
                "upstream_url": "http://kong.missxiaolin.com"
            }
        ]
    },
    "code": 0,
    "message": "ok",
    "time": "1531314953",
    "_ut": "0.06698"
}
~~~

#### API 详情
实例:/kong/apis/info
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>消费者Id</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        "created_at": 1531343625529,
        "strip_uri": true,
        "id": "dc7a2d44-4eb4-4ab6-a291-513494897f34",
        "hosts": [
            "kong.missxiaolin.com"
        ],
        "name": "xiaolin",
        "methods": [
            "GET",
            "POST"
        ],
        "http_if_terminated": false,
        "preserve_host": false,
        "upstream_url": "http://kong.missxiaolin.com",
        "uris": [
            "/demo"
        ],
        "upstream_send_timeout": 60000,
        "upstream_connect_timeout": 60000,
        "upstream_read_timeout": 60000,
        "retries": 5,
        "https_only": false
    },
    "code": 0,
    "message": "ok",
    "time": "1531314818",
    "_ut": "0.09713"
}
~~~

#### API 修改

实例:/kong/apis/upload
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>API Id</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>name</td>
        <td>api名称</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>hosts</td>
        <td>域</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>methods</td>
        <td>发送方式</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>uris</td>
        <td>匹配路径</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>upstream_url</td>
        <td>转发地址</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>strip_uri</td>
        <td>当一个匹配的URI路径prefixes API，这是从上游带前缀匹配被请求的URI。默认值为true。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>preserve_host</td>
        <td>当通过一个主机域名匹配API时，确保请求主机头被转发到上游服务。默认情况下，这是错误的，上游主机头将从配置的UnthuryURL中提取。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>retries</td>
        <td>在代理失败时执行重试的次数。默认值是5。UnSurthyLink连接超时”＝>以毫秒为单位的超时时间，以建立与上游服务的连接。默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>upstream_connect_timeout</td>
        <td>在建立与上游服务的连接时以毫秒为单位的超时时间。默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>upstream_send_timeout</td>
        <td>在两个连续写入操作之间的毫秒时间间隔，用于向上游服务发送请求的默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>upstream_read_timeout</td>
        <td>在两个连续读取操作之间的毫秒时间间隔，用于向上游服务发送请求的默认值为60000。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>https_only</td>
        <td>如果您希望仅通过HTTPS在适当的端口（默认为8443）服务API，则启用。默认值：false。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>http_if_terminated</td>
        <td>在执行仅HTTPS流量时，请考虑X-PROTEDD PROTO头。默认值：false。</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "total": 1,
        "data": [
            {
                "created_at": 1531343625529,
                "strip_uri": true,
                "id": "dc7a2d44-4eb4-4ab6-a291-513494897f34",
                "hosts": [
                    "kong.missxiaolin.com"
                ],
                "name": "xiaolin",
                "methods": [
                    "GET",
                    "POST"
                ],
                "http_if_terminated": false,
                "https_only": false,
                "retries": 5,
                "uris": [
                    "/demo"
                ],
                "preserve_host": false,
                "upstream_connect_timeout": 60000,
                "upstream_read_timeout": 60000,
                "upstream_send_timeout": 60000,
                "upstream_url": "http://kong.missxiaolin.com"
            }
        ]
    },
    "code": 0,
    "message": "ok",
    "time": "1531314953",
    "_ut": "0.06698"
}
~~~

#### API 删除
实例:/kong/apis/delete
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>API Id</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": null,
    "code": 0,
    "message": "ok",
    "time": "1530958731",
    "_ut": "0.03354"
}
~~~