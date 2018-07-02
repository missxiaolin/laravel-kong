<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/29
 * Time: 下午2:15
 */

namespace App\Support\Clients;

use App\Core\Http\Client;
use App\Core\InstanceTrait;
use App\Src\Models\Node;
use App\Support\Clients\Kong\RouteTrait;
use App\Support\Clients\Kong\ServiceTrait;

class KongHandler extends Client
{
    use InstanceTrait;

    use ServiceTrait, RouteTrait;

    /**
     * KongHandler constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $model = Node::first();
        if (!$model) {
            throw new \Exception('Kong节点不存在，请先配置节点信息');
        }
        $this->baseUri = $model->url;
    }

}