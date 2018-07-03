<?php

namespace App\Console\Commands\Kong\Consumer;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Info extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:consumer:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong 消费者详情';

    public $params = [
        'id' => 'The Consumer id.',
        'name' => 'The Consumer username.',
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
        $id = '05630133-1ea7-41ee-a52b-4a551b6caa48';
        $name = 'xiaolin';
        $client = KongClient::getInstance();
        $res = $client->getConsumer($name);
        dump($res);
    }
}
