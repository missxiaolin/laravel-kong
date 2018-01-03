<?php

namespace App\Console\Commands;

use App\Console\RpcServer;
use App\Core\Swoole\Handler\HanderInterface;
use App\Core\Swoole\Handler\TestHandler;
use swoole_server;
use Exception;

class Server extends RpcServer
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swoole:server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'swoole server';

    /**
     * host
     * @var string
     */
    protected $host = '0.0.0.0';

    /**
     * 端口号
     * @var int
     */
    protected $port = '11520';

    /**
     * 配置项
     * @var array
     */
    protected $config = [
        'pid_file' => './socket.pid',
        'daemonize' => false,
        'max_request' => 500, // 每个worker进程最大处理请求次数
        'worker_num' => 1,
    ];

    /**
     * @var array
     */
    public $services = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setHandler('test',TestHandler::getInstance());
        parent::__construct();
    }

    /**
     * @param $service
     * @param HanderInterface $hander
     * @return $this
     */
    public function setHandler($service, HanderInterface $hander)
    {
        $this->services[$service] = $hander;
        return $this;
    }

    /**
     * @param swoole_server $server
     * @param $workerId
     */
    public function workerStart(swoole_server $server, $workerId)
    {
        // TODO: Implement workerStart() method.
    }

    /**
     * @param swoole_server $server
     * @param $fd
     * @param $reactor_id
     * @param $data
     */
    public function receive(swoole_server $server, $fd, $reactor_id, $data)
    {
        // TODO: Implement receive() method.
        try {
            $data = json_decode($data, true);
            $service = $data['service'];
            $method = $data['method'];
            $arguments = $data['arguments'];

            if (!isset($this->services[$service])) {
                throw new Exception("The service handler is not exist!");
            }

            $result = $this->services[$service]->$method(...$arguments);
            $server->send($fd, $this->success($result));
        } catch (\Exception $ex) {
            $server->send($fd, $this->fail($ex->getCode(), $ex->getMessage()));
        }
    }
}
