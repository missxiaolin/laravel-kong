<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/29
 * Time: 下午2:08
 */

namespace App\Support\Clients;


use App\Core\InstanceTrait;

class KongClient
{
    use InstanceTrait;

    protected $handler;

    public function __call($name, $arguments)
    {
        $handler = KongHandler::getInstance();
        try {
            return $handler->$name(...$arguments);
        } catch (ClientException $ex) {
            $json = json_decode($ex->getResponse()->getBody()->getContents(), true);
            $message = Arr::get($json, 'message');
            throw new BizException(ErrorCode::$ENUM_KONG_API_FAIL, $message);
        }
    }
}