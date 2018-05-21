<?php
namespace App\Core\Swoole\Handler;

use App\Core\InstanceTrait;

class TestHandler extends Handler
{
    use InstanceTrait;

    /**
     * @return string
     */
    public function returnString()
    {
        return 'success';
    }

    /**
     * @return bool
     */
    public function returnTrue()
    {
        return true;
    }

    /**
     * @return array
     */
    public function returnArray()
    {
        return [
            'key' => 'val',
        ];
    }

    /**
     * @param $name
     * @return string
     */
    public function hasArguments($name)
    {
        return "hi, {$name}";
    }

    /**
     * @return string
     */
    public function recvTimeout()
    {
        sleep(2);
        return 'runtime is 2 seconds';
    }

    /**
     * @throws \Exception
     */
    public function exception()
    {
        throw new \Exception('测试异常', 400);
    }
}