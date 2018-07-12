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

#### 插件添加
实例:/kong/plugins/add
方式: post

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
        
    },
    "code": 0,
    "message": "ok",
    "time": "1531305841",
    "_ut": "0.12777"
}
~~~

#### 插件列表
实例:/kong/plugins/lists
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
    "data": [
        {
            
        }
    ],
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 插件详情
实例:/kong/plugins/info
方式: any

<table>
    <tr>
        <td>字段</td>
        <td>说明</td>
        <td>是否必填</td>
    </tr>
    <tr>
        <td>id</td>
        <td>插件Id</td>
        <td>Y</td>
    </tr>
</table>

~~~
{
    "data": {
        
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 插件修改

实例:/kong/plugins/upload
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
</table>

~~~
{
    "data": {
        
    },
    "code": "0",
    "message": "ok",
    "time": "1530779715",
    "_ut": "0.08884"
}
~~~

#### 插件删除
实例:/kong/plugins/delete
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
    "data": null,
    "code": 0,
    "message": "ok",
    "time": "1530958731",
    "_ut": "0.03354"
}
~~~