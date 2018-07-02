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
     * @param $name
     * @param $url
     * @return mixed
     * @author xl
     */
    public function addService($name, $url)
    {
        $params = [
            'name' => $name,
            'url' => $url,
        ];
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
}