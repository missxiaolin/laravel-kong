<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// swoole rpc 测试
Route::any('/index/index', 'IndexController@index')->name('index.index');
Route::any('/index/timeout', 'IndexController@timeout')->name('index.timeout');