<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Routes\Request;

use Lin\Src\Basic\Request;

class AddRequest extends Request
{
    public function getUri()
    {
        return '/routes/';
    }

    public function getMethod()
    {
        return "POST";
    }

    public function getName()
    {
        return 'routes.add';
    }
}