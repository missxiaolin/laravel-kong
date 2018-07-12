<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Plugins\Request;

use App\Kong\Basic\Request;

class DeleteRequest extends Request
{
    public function getUri()
    {
        return '/plugins/' . $this->data['id'];
    }

    public function getMethod()
    {
        return "DELETE";
    }

    public function getName()
    {
        return 'plugins.delete';
    }
}