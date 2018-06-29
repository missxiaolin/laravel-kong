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
use App\Support\Clients\Kong\ServiceTrait;

class KongHandler extends Client
{
    use InstanceTrait;

    use ServiceTrait;

    protected $baseUri = 'http://kong.missxiaolin.com';

    /**
     * KongHandler constructor.
     */
    public function __construct()
    {
        $config = config('kong');
        $this->baseUri = $config['host'];
    }

}