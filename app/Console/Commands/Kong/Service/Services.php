<?php

namespace App\Console\Commands\Kong\Service;

use App\Support\Clients\KongHandler;
use Illuminate\Console\Command;

class Services extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '查看Kong服务列表';

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
        try {
            $client = KongHandler::getInstance();
            $res = $client->services();
            dd($res);
        } catch (\Exception $ex) {
            dump($ex->getMessage());
        }
    }
}
