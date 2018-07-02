<?php

namespace App\Console\Commands\Kong\Nodes;

use App\Src\Repository\NodeRepository;
use Illuminate\Console\Command;

class Add extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:nodes:add {name} {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong增加节点';

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
        $data = [
            'name' => $this->argument('name'),
            'url' => $this->argument('url'),
        ];
        $res = NodeRepository::setNode($data);
        dump($res);
        if ($res) {
            dump('节点添加成功！');
        }
    }
}
