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
    "data": {
        [
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
        ]
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~