<?php

namespace App\Console\Commands\Kong\Api;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:api:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong api删除';

    public $params = [
        'id' => 'The Service id.',
        'name' => 'The Service name.',
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
        $id = '579d6bbe-0bc5-499a-a99a-2ef3b0c686c1';

        $client = KongClient::getInstance();
        $res = $client->deleteApi($id);
        dump($res);
    }
}
