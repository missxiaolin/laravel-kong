<?php
namespace App\Support\Clients\Kong;

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
        return $this->get("/services/{$routeId}/routes");
    }

    /**
     * @desc   新增路由
     * @author xl
     * @param $params
     * @return mixed
     */
    public function addRoute($params)
    {
        if (isset($params['methods']) && !is_array($params['methods'])) {
            $params['methods'] = [$params['methods']];
        }

        if (isset($params['paths']) && !is_array($params['paths'])) {
            $params['paths'] = [$params['paths']];
        }

        return $this->post("/routes/", [
            'json' => $params
        ]);
    }

    /**
     * @desc   路由列表
     * @author xl
     * @params offset
     * @params size
     * @return mixed
     */
    public function routes($params = [])
    {
        return $this->get('/routes/', [
            'json' => $params
        ]);
    }

    /**
     * @desc   路由详情
     * @author xl
     * @param $id
     * @return mixed
     */
    public function getRoute($id)
    {
        return $this->get("/routes/{$id}");
    }
}
