<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/22
 * Time: 下午3:43
 */
// 用户登录
Route::post('/user/login', 'UserController@login')->name('user.login');

Route::group(['middleware' => 'auth.kong'], function () {
    // 用户模块
    Route::any('/user/status', 'UserController@status')->name('user.add');
    Route::any('/user/lists', 'UserController@lists')->name('user.lists');
    Route::post('/user/add', 'UserController@add')->name('user.add');



    // Kong模块
    Route::any('/index/kong', 'IndexController@kong')->name('index.kong');
    Route::any('/index/add', 'IndexController@add')->name('index.add');

});