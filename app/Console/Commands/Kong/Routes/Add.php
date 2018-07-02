<?php

namespace App\Console\Commands\Kong\Routes;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Add extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:routes:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong路由添加';

    public $params = [
        'protocols' => 'A list of the protocols this Route should allow. By default it is ["http", "https"], which means that the Route accepts both. When set to ["https"], HTTP requests are answered with a request to upgrade to HTTPS. With form-encoded, the notation is protocols[]=http&protocols[]=https. With JSON, use an Array.',
        'methods' => 'A list of HTTP methods that match this Route. For example: ["GET", "POST"]. At least one of hosts, paths, or methods must be set. With form-encoded, the notation is methods[]=GET&methods[]=OPTIONS. With JSON, use an Array.',
        'hosts' => 'A list of domain names that match this Route. For example: example.com. At least one of hosts, paths, or methods must be set. With form-encoded, the notation is hosts[]=foo.com&hosts[]=bar.com. With JSON, use an Array.',
        'paths' => 'A list of paths that match this Route. For example: /my-path. At least one of hosts, paths, or methods must be set. With form-encoded, the notation is paths[]=/foo&paths[]=/bar. With JSON, use an Array.',
        'strip_path' => 'When matching a Route via one of the paths, strip the matching prefix from the upstream request URL. Defaults to true.',
        'preserve_host' => 'When matching a Route via one of the hosts domain names, use the request Host header in the upstream request headers. By default set to false, and the upstream Host header will be that of the Service\'s host.',
        'service.id' => 'The Service this Route is associated to. This is where the Route proxies traffic to. With form-encoded, the notation is service.id=<service_id>. With JSON, use "service":{"id":"<service_id>"}.',
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $params = [
            "protocols" => ["http", "https"],
            "methods" => null,
            "hosts" => ["kong.missxiaolin.com"],
            "paths" => null,
            "regex_priority" => 0,
            "strip_path" => true,
            "preserve_host" => false,
            'service' => [
                'id' => '2bda353e-cd8a-4815-ba24-5effe317e9c5',
            ],
        ];

        $client = KongClient::getInstance();
        $res = $client->addRoute($params);
        dump($res);
    }
}
