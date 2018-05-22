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
}