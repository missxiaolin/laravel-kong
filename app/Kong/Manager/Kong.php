<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/7
 * Time: 下午4:15
 */

namespace App\Kong\Manager;

use Lin\Src\Basic\Manager;

class Kong extends Manager
{
    public function getHost()
    {

        $config = $this->getConfig();

        $host = array_get($config, 'kong');

        if (!$host) {
            throw new \Exception('Kong IS NULL');
        }

        return $host;
    }
}