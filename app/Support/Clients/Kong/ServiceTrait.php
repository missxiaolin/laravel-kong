<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/6/29
 * Time: 下午2:06
 */

namespace App\Support\Clients\Kong;


trait ServiceTrait
{
    /**
     * @param $params array
     * @return mixed
     * @author xl
     */
    public function addService($params)
    {
        return $this->post('/services/', [
            'form_params' => $params,
        ]);
    }

    /**
     * @param $params array
     * @desc   服务列表
     * @author xl
     * @params offset
     * @params size
     * @return mixed
     */
    public function services($params = [])
    {
        return $this->get('/services/', [
            'form_params' => $params,
        ]);
    }

    /**
     * @desc   更新服务
     * @author xl
     * @param $idOrName The service id or name
     * @param $params
     * @return mixed
     */
    public function updateService($idOrName, $params)
    {
        unset($params['id']);
        return $this->patch("/services/{$idOrName}", [
            'form_params' => $params,
        ]);
    }

    /**
     * @desc   获取服务详情
     * @author xl
     * @param $idOrName
     * @return mixed
     */
    public function getService($idOrName)
    {
        return $this->get("/services/{$idOrName}");
    }
}