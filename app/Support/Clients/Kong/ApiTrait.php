<?php

namespace App\Support\Clients\Kong;

trait ApiTrait
{
    /**
     * @desc   新增API
     * @author xl
     * @param $params
     * @return mixed
     */
    public function addApi($params)
    {
        return $this->post("/apis/", [
            'json' => $params,
        ]);
    }

    /**
     * @desc   获取API详情
     * @author limx
     * @param $idOrName
     * @return mixed
     * @return mixed
     */
    public function getApi($idOrName)
    {
        return $this->get("/apis/{$idOrName}");
    }

    /**
     * @desc   删除API
     * @author xl
     * @param $idOrName
     * @return mixed
     */
    public function deleteApi($idOrName)
    {
        return $this->delete("/apis/{$idOrName}");
    }

    /**
     * @desc   API列表
     * @param $params
     * @author xl
     * @params offset
     * @params size
     * @return mixed
     */
    public function apis($params = [])
    {
        return $this->get('/apis/', [
            'json' => $params,
        ]);
    }

    /**
     * @desc   更新API
     * @author xl
     * @param $idOrName The service id or name
     * @param $params
     * @return mixed
     */
    public function updateApi($idOrName, $params)
    {
        unset($params['id']);
        return $this->patch("/apis/{$idOrName}", [
            'json' => $params,
        ]);
    }
}
