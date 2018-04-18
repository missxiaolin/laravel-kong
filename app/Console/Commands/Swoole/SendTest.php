<?php

namespace App\Console\Commands\Swoole;

use App\Core\Swoole\Test\TestClient;
use Illuminate\Console\Command;

class SendTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swoole:send@test {num}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $num = $this->argument('num');
        try {
            $begin_time = microtime(true);
            for ($i = 0; $i < $num; $i++) {
                $result = TestClient::getInstance()->returnString();
                dump($result);
            }
            $end_time = microtime(true);
            dd('swoole 处理时间为:' . ($end_time - $begin_time));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
