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

#### 路由添加

实例:/kong/routes/add
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>protocols</td>
        <td>此路由应允许的协议列表。默认情况下["http", "https"]，这意味着Route接受两者。设置["https"]为时，将通过请求升级到HTTPS来回答HTTP请求。使用表单编码，表示法是protocols[]=http&protocols[]=https。使用JSON，使用数组。</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>methods</td>
        <td>此与此Route匹配的HTTP方法列表。例如：["GET", "POST"]。至少一个hosts，paths或者methods必须设置。使用表单编码，表示法是methods[]=GET&methods[]=OPTIONS。使用JSON，使用数组。</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>paths</td>
        <td>与此路由匹配的路径列表。例如：/my-path。至少一个hosts，paths或者methods必须设置。使用表单编码，表示法是paths[]=/foo&paths[]=/bar。使用JSON，使用数组。</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>hosts</td>
        <td>与此路由匹配的域名列表。例如：example.com。至少一个hosts，paths或者methods必须设置。使用表单编码，表示法是hosts[]=foo.com&hosts[]=bar.com。使用JSON，使用数组。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>strip_path</td>
        <td>与通过其中一个路由匹配路由时paths，从上游请求URL中删除匹配的前缀。默认为true。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>preserve_host</td>
        <td>通过其中一个hosts域名匹配Route时，请使用Host上游请求标头中的请求标头。默认情况下设置为false，上游标Host头将是服务的标头host。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>service_id.id</td>
        <td>此路线所关联的服务。这是Route代理流量的地方。使用表单编码，表示法是service.id=<service_id>。使用JSON，使用"service":{"id":"<service_id>"}。永久链接</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "created_at": 1530943830,
        "strip_path": true,
        "hosts": null,
        "preserve_host": false,
        "regex_priority": 0,
        "updated_at": 1530943830,
        "paths": [
            "/demo"
        ],
        "service": {
            "id": "343dafad-5201-4e3f-8c82-a96bb8edafac"
        },
        "methods": [
            "POST",
            "GET"
        ],
        "protocols": [
            "http",
            "https"
        ],
        "id": "d2cf145f-0f4a-4b87-a34f-f8b9e9d2b783"
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 路由修改

实例:/kong/routes/upload
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>ID</td>
        <td>路由Id</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>protocols</td>
        <td>此路由应允许的协议列表。默认情况下["http", "https"]，这意味着Route接受两者。设置["https"]为时，将通过请求升级到HTTPS来回答HTTP请求。使用表单编码，表示法是protocols[]=http&protocols[]=https。使用JSON，使用数组。</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>methods</td>
        <td>此与此Route匹配的HTTP方法列表。例如：["GET", "POST"]。至少一个hosts，paths或者methods必须设置。使用表单编码，表示法是methods[]=GET&methods[]=OPTIONS。使用JSON，使用数组。</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>paths</td>
        <td>与此路由匹配的路径列表。例如：/my-path。至少一个hosts，paths或者methods必须设置。使用表单编码，表示法是paths[]=/foo&paths[]=/bar。使用JSON，使用数组。</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>hosts</td>
        <td>与此路由匹配的域名列表。例如：example.com。至少一个hosts，paths或者methods必须设置。使用表单编码，表示法是hosts[]=foo.com&hosts[]=bar.com。使用JSON，使用数组。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>strip_path</td>
        <td>与通过其中一个路由匹配路由时paths，从上游请求URL中删除匹配的前缀。默认为true。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>preserve_host</td>
        <td>通过其中一个hosts域名匹配Route时，请使用Host上游请求标头中的请求标头。默认情况下设置为false，上游标Host头将是服务的标头host。</td>
        <td>N</td>
    </tr>
    <tr>
        <td>strip_path</td>
        <td>此路线所关联的服务。这是Route代理流量的地方。使用表单编码，表示法是service.id=<service_id>。使用JSON，使用"service":{"id":"<service_id>"}。永久链接</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "created_at": 1530943830,
        "strip_path": true,
        "hosts": null,
        "preserve_host": false,
        "regex_priority": 0,
        "updated_at": 1530943830,
        "paths": [
            "/demo"
        ],
        "service": {
            "id": "343dafad-5201-4e3f-8c82-a96bb8edafac"
        },
        "methods": [
            "POST",
            "GET"
        ],
        "protocols": [
            "http",
            "https"
        ],
        "id": "d2cf145f-0f4a-4b87-a34f-f8b9e9d2b783"
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 路由详情
实例:/kong/routes/info
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>路由Id</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "created_at": 1530596388,
        "strip_path": true,
        "hosts": null,
        "preserve_host": false,
        "regex_priority": 0,
        "updated_at": 1530596388,
        "paths": [
            "/demo"
        ],
        "service": {
            "id": "343dafad-5201-4e3f-8c82-a96bb8edafac"
        },
        "methods": [
            "POST",
            "GET"
        ],
        "protocols": [
            "http",
            "https"
        ],
        "id": "50731d30-eb8f-42a4-8288-c33558987e9f"
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 路由列表
实例:/kong/routes/lists
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
            "created_at": 1530596388,
            "strip_path": true,
            "hosts": null,
            "preserve_host": false,
            "regex_priority": 0,
            "updated_at": 1530596388,
            "paths": [
                "/demo"
            ],
            "service": {
                "id": "343dafad-5201-4e3f-8c82-a96bb8edafac"
            },
            "methods": [
                "POST",
                "GET"
            ],
            "protocols": [
                "http",
                "https"
            ],
            "id": "50731d30-eb8f-42a4-8288-c33558987e9f"
        }
    ],
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 路由删除
实例:/kong/routes/delete
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>路由Id</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": null,
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~