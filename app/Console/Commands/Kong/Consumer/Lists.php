<?php

namespace App\Console\Commands\Kong\Consumer;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Lists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:consumer:lists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong 消费者列表';

    public $params = [
        'id' => 'A filter on the list based on the consumer id field.',
        'custom_id' => 'A filter on the list based on the consumer custom_id field.',
        'username' => 'A filter on the list based on the consumer username field.',
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
//            'custom_id' => '10',
        ];
        $client = KongClient::getInstance();
        $res = $client->consumers($params);
        dump($res);
    }
}
