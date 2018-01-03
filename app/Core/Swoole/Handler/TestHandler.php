<?php
namespace App\Core\Swoole\Handler;

use App\Core\InstanceTrait;

class TestHandler implements HanderInterface
{
    use InstanceTrait;

    public function returnString()
    {
        return 'success';
    }
}