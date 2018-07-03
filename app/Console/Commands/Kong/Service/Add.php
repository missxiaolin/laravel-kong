<?php

namespace App\Console\Commands\Kong\Service;

use App\Console\Kong;
use App\Support\Clients\KongClient;

class Add extends Kong
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:service:add {name} {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '添加Kong服务';

    public $params = [
        'name' => 'The Service name.',
        'protocol' => 'The protocol used to communicate with the upstream. It can be one of http (default) or https.',
        'host' => 'The host of the upstream server.',
        'port' => 'The upstream server port. Defaults to 80.',
        'path' => 'The path to be used in requests to the upstream server. Empty by default.',
        'retries' => 'The number of retries to execute upon failure to proxy. The default is 5.',
        'connect_timeout' => 'The timeout in milliseconds for establishing a connection to the upstream server. Defaults to 60000.',
        'write_timeout' => 'The timeout in milliseconds between two successive write operations for transmitting a request to the upstream server. Defaults to 60000.',
        'read_timeout' => 'The timeout in milliseconds between two successive read operations for transmitting a request to the upstream server. Defaults to 60000.',
        'url' => 'Shorthand attribute to set protocol, host, port and path at once. This attribute is write-only (the Admin API never "returns" the url).',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed|void
     */
    public function init()
    {
        $name = $this->argument('name');
        $url = $this->argument('url');

        $param = [
            'name' => $name,
            'url' => $url,
        ];
        try {
            $res = KongClient::getInstance()->addService($param);
            dump($res);
            dump('节点添加成功！');
        } catch (\Exception $ex) {
            dump($ex->getMessage());
        }

    }
}
