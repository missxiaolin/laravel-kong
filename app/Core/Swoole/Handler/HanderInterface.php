<?php
namespace App\Core\Swoole\Handler;

use swoole_server;

interface HanderInterface
{
    /**
     * HanderInterface constructor.
     * @param swoole_server $server
     * @param integer       $fd
     * @param integer       $reactorId
     */
    public function __construct(swoole_server $server, $fd, $reactorId);

    /**
     * @desc   返回Swoole Server实例
     * @author xl
     * @return swoole_server
     */
    public function getServer();

    /**
     * @desc   TCP客户端连接的唯一标识符
     * @author xl
     * @return int
     */
    public function getFd();

    /**
     * @desc   TCP连接所在的Reactor线程ID
     * @author xl
     * @return int
     */
    public function getReactorId();
}