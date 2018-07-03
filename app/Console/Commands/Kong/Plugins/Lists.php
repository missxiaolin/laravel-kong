<?php

namespace App\Console\Commands\Kong\Plugins;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Lists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:plugins:lists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong 插件列表';

    public $params = [
        'id' => 'A filter on the list based on the id field.',
        'name' => 'A filter on the list based on the name field.',
        'service_id' => 'A filter on the list based on the service_id field.',
        'route_id' => 'A filter on the list based on the route_id field.',
        'consumer_id' => 'A filter on the list based on the consumer_id field.',
        'offset' => 'A cursor used for pagination. offset is an object identifier that defines a place in the list.',
        'size' => 'A limit on the number of objects to be returned.',
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
//            'name' => 'ip-restriction',
        ];
        $client = KongClient::getInstance();
        $res = $client->plugins($params);
        dump($res);
    }
}
