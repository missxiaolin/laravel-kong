### 用户接口

#### 错误信息
~~~
{
    "data": [],
    "code": 1003,
    "message": "密码必填。",
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

#### 登陆
实例:/kong/user/login

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
        <td>password</td>
        <td>用户密码</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        "token": "jt7HffOJp03EC4aBUBzs5b3dd843552c6357614546"
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

实例:/kong/user/lists

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>page</td>
        <td>页数</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        "total": 8,
        "pageCount": 1,
        "data": [
            {
                "id": 1,
                "name": "xiaolin",
                "mobile": "xxxxx",
                "created_at": "2018-07-05 07:59:31",
                "updated_at": "2018-07-04 23:59:31"
            },
        ]
    },
    "code": "0",
    "message": "ok",
    "time": "1530779317",
    "_ut": "0.01457"
}
~~~