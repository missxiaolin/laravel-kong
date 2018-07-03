<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/29
 * Time: 下午2:08
 */

namespace App\Support\Clients;

use App\Core\Enums\ErrorCode;
use App\Core\Http\Exception\InitException;
use Exception;
use App\Core\InstanceTrait;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Arr;

/**
 * Class KongClient
 * @package App\Common\Clients
 * @method addService($params = [])
 * @method services($params = [])
 * @method updateService($idOrName, $params)
 * @method getService($idOrName)
 *
 * @method addRoute($params)
 * @method routes($params = [])
 * @method getRoute($id)
 * @method updateRoute($id, $params)
 */
class KongClient
{
    use InstanceTrait;

    protected $handler;

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws \App\Core\Http\Exception\InitException
     */
    public function __call($name, $arguments)
    {
        $handler = KongHandler::getInstance();
        try {
            return $handler->$name(...$arguments);
        } catch (ClientException $ex) {
            $json = json_decode($ex->getResponse()->getBody()->getContents(), true);
            $message = Arr::get($json, 'message');
            throw new InitException($message, ErrorCode::$ENUM_KONG_API_FAIL);
        }
    }
}