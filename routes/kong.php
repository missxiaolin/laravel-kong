<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/22
 * Time: 下午3:43
 */
// 用户登录
Route::post('/user/login', 'UserController@login')->name('user.login');

// Kong测试api
Route::any('/index/kong', 'IndexController@kong')->name('index.kong');
Route::any('/index/add', 'IndexController@add')->name('index.add');

Route::group(['middleware' => ['auth.kong']], function () {
    Route::post('/user/btn/power', 'UserController@btnPower')->name('user.btn.power');
    Route::any('/user/power', 'UserController@power')->name('user.power');
});

Route::group(['middleware' => ['auth.kong', 'rbac.kong']], function () {
    // 权限模块
    Route::any('/route/lists', 'RouteController@lists')->name('route.lists');
    Route::post('/route/save', 'RouteController@save')->name('route.save');
    Route::post('/route/search', 'RouteController@search')->name('route.search');
    Route::any('/route/info', 'RouteController@info')->name('route.info');
    Route::any('/route/delete', 'RouteController@delete')->name('route.delete');

    // 角色模块
    Route::any('/role/reload', 'RoleController@reload')->name('role.reload');
    Route::any('/role/lists', 'RoleController@lists')->name('role.lists');
    Route::post('/role/add', 'RoleController@add')->name('role.add');
    Route::any('/role/info', 'RoleController@info')->name('role.info');
    Route::any('/role/delete', 'RoleController@delete')->name('role.delete');
    Route::post('/role/routers', 'RoleController@routers')->name('role.routers');
    Route::post('/role/routers/update', 'RoleController@routersUpdate')->name('role.routers.update');

    // 用户模块
    Route::any('/user/status', 'UserController@status')->name('user.add');
    Route::any('/user/lists', 'UserController@lists')->name('user.lists');
    Route::post('/user/add', 'UserController@add')->name('user.add');
    Route::get('/user/info', 'UserController@info')->name('user.info');
    Route::get('/user/roles', 'UserController@roles')->name('user.roles');
    Route::post('/user/update/roles', 'UserController@updateRoles')->name('user.update.roles');


    // Kong Service 模块
    Route::any('/service/lists', 'ServiceController@lists')->name('service.lists');
    Route::post('/service/add', 'ServiceController@add')->name('service.add');
    Route::any('/service/info', 'ServiceController@info')->name('service.info');
    Route::post('/service/upload', 'ServiceController@upload')->name('service.upload');
    Route::any('/service/delete', 'ServiceController@delete')->name('service.delete');

    // Kong 路由 模块
    Route::any('/routes/lists', 'RoutesController@lists')->name('routes.lists');
    Route::post('/routes/add', 'RoutesController@add')->name('routes.add');
    Route::post('/routes/upload', 'RoutesController@upload')->name('routes.upload');
    Route::any('/routes/delete', 'RoutesController@delete')->name('routes.delete');
    Route::any('/routes/info', 'RoutesController@info')->name('routes.info');

    // Kong Api 模块
    Route::any('/api/lists', 'ApiController@lists')->name('api.lists');
    Route::post('/api/add', 'ApiController@add')->name('api.add');
    Route::post('/api/upload', 'ApiController@upload')->name('api.upload');
    Route::any('/api/delete', 'ApiController@delete')->name('api.delete');
    Route::any('/api/info', 'ApiController@info')->name('api.info');

    // Kong 插件 模块
    Route::any('/plugins/lists', 'PluginsController@lists')->name('plugins.lists');
    Route::post('/plugins/add', 'PluginsController@add')->name('plugins.add');
    Route::post('/plugins/upload', 'PluginsController@upload')->name('plugins.upload');
    Route::any('/plugins/delete', 'PluginsController@delete')->name('plugins.delete');
    Route::any('/plugins/info', 'PluginsController@info')->name('plugins.info');

    // Kong 消费者 模块
    Route::any('/consumer/lists', 'ConsumerController@lists')->name('consumer.lists');
    Route::post('/consumer/add', 'ConsumerController@add')->name('consumer.add');
    Route::post('/consumer/upload', 'ConsumerController@upload')->name('consumer.upload');
    Route::any('/consumer/info', 'ConsumerController@info')->name('consumer.info');
    Route::any('/consumer/delete', 'ConsumerController@delete')->name('consumer.delete');

});