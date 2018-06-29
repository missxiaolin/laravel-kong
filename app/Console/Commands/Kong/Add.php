<?php

namespace App\Console\Commands\Kong;

use App\Support\Clients\KongClient;
use Illuminate\Console\Command;

class Add extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:add {name} {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '添加Kong服务';

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
     * @throws \App\Core\Http\Exception\InitException
     */
    public function handle()
    {

        $name = $this->argument('name');
        $url = $this->argument('url');
        try {
            $res = KongClient::getInstance()->add($name, $url);
            dump($res);
        } catch (\Exception $ex) {
            dump($ex->getMessage());
        }

    }
}
