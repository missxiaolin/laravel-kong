<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Plugins\Request;

use Lin\Src\Basic\Request;

class ListsRequest extends Request
{
    public function getUri()
    {
        return '/plugins/';
    }

    public function getMethod()
    {
        return "GET";
    }

    public function getName()
    {
        return 'plugins.lists';
    }
}