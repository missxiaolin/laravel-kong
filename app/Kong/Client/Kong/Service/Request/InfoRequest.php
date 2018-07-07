<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午4:21
 */

namespace App\Kong\Client\Kong\Service\Request;

use App\Kong\Basic\Request;

class InfoRequest extends Request
{
    public function getUri()
    {
        return '/services/' . $this->data['id'];
    }

    public function getMethod()
    {
        return "GET";
    }

    public function getName()
    {
        return 'kong.info';
    }
}