<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午8:14
 */

namespace App\Kong\Client\Kong\Consumer\Request;

use Lin\Src\Basic\Request;

class DeleteRequest extends Request
{
    public function getUri()
    {
        return '/consumers/' . $this->data['id'];
    }

    public function getMethod()
    {
        return "DELETE";
    }

    public function getName()
    {
        return 'consumers.delete';
    }
}