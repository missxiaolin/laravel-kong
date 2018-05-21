<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/21
 * Time: 下午7:19
 */

namespace App\Core\Swoole\Handler;

use swoole_server;

abstract class Handler implements HanderInterface
{
    protected $server;

    protected $fd;

    protected $reactorId;

    public function __construct(swoole_server $server, $fd, $reactorId)
    {
        $this->server = $server;
        $this->fd = $fd;
        $this->reactorId = $reactorId;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function getFd()
    {
        return $this->fd;
    }

    public function getReactorId()
    {
        return $this->reactorId;
    }

}