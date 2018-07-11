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

#### 消费者添加
实例:/kong/consumer/add
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>username</td>
        <td>用户名称</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>custom_id</td>
        <td>用于存储消费者的现有唯一ID的字段 - 对于将Kong与现有数据库中的用户进行映射非常有用。您必须发送此字段或username请求。</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "custom_id": "13",
        "created_at": 1531305841000,
        "username": "xiaojuan1",
        "id": "f470cb35-1b9a-4401-87be-312ce4f50aa1"
    },
    "code": 0,
    "message": "ok",
    "time": "1531305841",
    "_ut": "0.12777"
}
~~~

#### 消费者列表
实例:/kong/consumer/lists
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>custom_id</td>
        <td>基于使用者custom_id字段的列表上的过滤器。</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": [
        {
            "created_at": 1530602373000,
            "username": "xiaolin",
            "id": "626a7ca9-c84e-442d-bb4a-7f1fce5d5fc1"
        }
    ],
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 消费者详情
实例:/kong/consumer/info
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
        "created_at": 1530602373000,
        "username": "xiaolin",
        "id": "626a7ca9-c84e-442d-bb4a-7f1fce5d5fc1"
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 消费者修改

实例:/kong/consumer/upload
方式: post

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
    <tr>
        <td>username</td>
        <td>用户名称</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>custom_id</td>
        <td>用于存储消费者的现有唯一ID的字段 - 对于将Kong与现有数据库中的用户进行映射非常有用。您必须发送此字段或username请求。</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "created_at": 1530602373000,
        "username": "xiaolin",
        "id": "626a7ca9-c84e-442d-bb4a-7f1fce5d5fc1"
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 服务删除
实例:/kong/consumer/delete
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
    "data": null,
    "code": 0,
    "message": "ok",
    "time": "1530958731",
    "_ut": "0.03354"
}
~~~