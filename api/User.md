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
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>mobile</td>
        <td>手机号码</td>
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

#### 添加用户、修改用户

实例:/kong/user/add
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>自增Id</td>
        <td>N</td>
    </tr>
    <tr>
        <td>name</td>
        <td>用户名称</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>mobile</td>
        <td>手机号码</td>
        <td>Y</td>
    </tr>
    <tr>
        <td>password</td>
        <td>密码</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        "name": "1",
        "mobile": "17135501103",
        "updated_at": "2018-07-05 09:11:23",
        "created_at": "2018-07-05 09:11:23",
        "id": 13
    },
    "code": "0",
    "message": "ok",
    "time": "1530781883",
    "_ut": "0.08316"
}
~~~

#### 查询用户

实例:/kong/user/info
方式: post

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>自增Id</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        "name": "1",
        "mobile": "17135501103",
        "updated_at": "2018-07-05 09:11:23",
        "created_at": "2018-07-05 09:11:23",
        "id": 13
    },
    "code": "0",
    "message": "ok",
    "time": "1530781883",
    "_ut": "0.08316"
}
~~~

#### 用户禁用、开启

实例:/kong/user/status
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>用户Id</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        "id": 1,
        "name": "xiaolin",
        "mobile": "17135501111",
        "status": 1,
        "expires_at": 1530783315,
        "created_at": "2018-07-05 18:07:50",
        "updated_at": "2018-07-05 10:07:53"
    },
    "code": "0",
    "message": "ok",
    "time": "1530785273",
    "_ut": "0.01231"
}
~~~

#### 用户列表

实例:/kong/user/lists
方式: any

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
    <tr>
        <td>mobile</td>
        <td>手机号</td>
        <td>N</td>
    </tr>
    <tr>
        <td>status</td>
        <td>状态</td>
        <td>N</td>
    </tr>
    <tr>
        <td>create_start</td>
        <td>创建开始时间</td>
        <td>N</td>
    </tr>
    <tr>
        <td>create_end</td>
        <td>创建结束时间</td>
        <td>N</td>
    </tr>
    <tr>
        <td>size</td>
        <td>分页个数</td>
        <td>N</td>
    </tr>
</table>

~~~
{
    "data": {
        "total": 8,
        "pageCount": 1,
        "items": [
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