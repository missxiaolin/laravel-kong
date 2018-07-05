<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/22
 * Time: 下午3:43
 */
Route::any('/user/login', 'UserController@login')->name('user.login');

Route::group(['middleware' => 'auth.kong'], function () {
    Route::any('/index/kong', 'IndexController@kong')->name('index.kong');
    Route::any('/index/add', 'IndexController@add')->name('index.add');
});