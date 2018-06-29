<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/22
 * Time: 下午3:50
 */

namespace App\Http\Controllers\Kong;


class IndexController
{
    public function kong()
    {
        dd(config('kong')['host']);
    }
}