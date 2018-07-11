<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Plugins\Request;

use App\Kong\Basic\Request;

class ListsRequest extends Request
{
    public function getUri()
    {
        return '/routes/';
    }

    public function getMethod()
    {
        return "GET";
    }

    public function getName()
    {
        return 'routes.lists';
    }
}