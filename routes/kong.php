<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/22
 * Time: 下午3:43
 */

Route::any('/index/kong', 'IndexController@kong')->name('index.kong');

Route::any('/index/add', 'IndexController@add')->name('index.add');