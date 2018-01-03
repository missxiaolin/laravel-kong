<?php
namespace App\Console;

use swoole_server;

class Server
{
    /**
     * host
     * @var string
     */
    public $host;

    /**
     * 端口号
     * @var int
     */
    public $port;

    /**
     * 配置项
     * @var array
     */
    public $config;

    /**
     * @param $host
     * @param $port
     * @param array $config
     */
    public function serve($host, $port, $config = [])
    {
        if (!extension_loaded('swoole')) {
            dump('The swoole extension is not installed');
            return;
        }

        $this->host = $host;
        $this->port = $port;
        $this->config = $config;

        set_time_limit(0);
        $server = new swoole_server($host, $port);

        $server->set($config);

        $server->on('receive', [$this, 'receive']);
        $server->on('workerStart', [$this, 'workerStart']);

        $this->beforeServerStart($server);

        $server->start();
    }

    public function beforeServerStart(swoole_server $server)
    {
        echo "-------------------------------------------" . PHP_EOL;
        echo "     Socket服务器开启 端口：" . $this->port . PHP_EOL;
        echo "-------------------------------------------" . PHP_EOL;
    }

    /**
     * @param swoole_server $server
     * @param $workerId
     */
    public function workerStart(swoole_server $server, $workerId)
    {
    }

    /**
     * @param swoole_server $server
     * @param $fd
     * @param $reactor_id
     * @param $data
     */
    public function receive(swoole_server $server, $fd, $reactor_id, $data)
    {

    }
}