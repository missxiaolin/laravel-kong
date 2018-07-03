<?php

namespace App\Console\Commands\Kong\Consumer;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Add extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:consumer:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong 消费者添加';

    public $params = [
        'username' => 'The unique username of the consumer. You must send either this field or custom_id with the request.',
        'custom_id' => 'Field for storing an existing unique ID for the consumer - useful for mapping Kong with users in your existing database. You must send either this field or username with the request.',
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
            'username' => 'xiaolin',
//            'custom_id' => '10',
        ];
        $client = KongClient::getInstance();
        $res = $client->addConsumer($params);
        dump($res);
    }
}
