<?php

namespace App\Console\Commands\Kong\Nodes;

use App\Src\Repository\NodeRepository;
use Illuminate\Console\Command;

class lists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:nodes:lists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kong节点列表';

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
        $node = app(NodeRepository::class);
        $nodes = $node->getNodes();
        if (!$nodes->count()) {
            dd('您还没有配置任何节点');
        }
        /** @var \App\Src\Models\Node $node */
        foreach ($nodes ?? [] as $node) {
            dump("节点名: {$node->name}");
            dump("节点地址: {$node->url}");
        }
    }
}
