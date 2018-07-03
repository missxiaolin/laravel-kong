<?php

namespace App\Console\Commands\Kong\Api;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Lists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:api:lists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong api列表';

    public $params = [
        'offset' => 'A cursor used for pagination. offset is an object identifier that defines a place in the list.',
        'size' => 'A limit on the number of objects to be returned per page.',
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
        $params = [];
        $client = KongClient::getInstance();
        $res = $client->apis($params);

        dump($res);
    }
}
