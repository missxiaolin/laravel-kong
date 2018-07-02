<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/2
 * Time: 上午10:47
 */

namespace App\Console;

use Illuminate\Console\Command;

abstract class Kong extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:comand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong command';

    /**
     * @var array
     */
    public $params = [];

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
        $this->init([]);
    }

    /**
     * @param array $params
     * @return mixed
     */
    abstract function init($params = []);
}