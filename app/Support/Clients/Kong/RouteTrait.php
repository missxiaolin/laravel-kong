<?php
// +----------------------------------------------------------------------
// | RouteTrait.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients\Kong;

trait RouteTrait
{
    /**
     * @desc   查看某Route的服务信息
     * @author xl
     * @param $routeId
     * @return mixed
     */
    public function getRouteService($routeId)
    {
        return $this->post("/routes/{$routeId}/service");
    }

    /**
     * @desc   新增路由
     * @author xl
     * @param $params
     * @return mixed
     */
    public function addRoute($params)
    {
        return $this->post("/routes/", [
            'form_params' => $params,
        ]);
    }
}
