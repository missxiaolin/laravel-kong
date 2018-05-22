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
    /** @var swoole_server */
    protected $server;

    /** @var int TCP客户端连接的唯一标识符 */
    protected $fd;

    /** @var int TCP连接所在的Reactor线程ID */
    protected $reactorId;

    public function __construct(swoole_server $server, $fd, $reactorId)
    {
        $this->server = $server;
        $this->fd = $fd;
        $this->reactorId = $reactorId;
    }

}