<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/3
 * Time: 下午1:22
 */

namespace App\Support\Clients\Kong;


trait ConsumerTrait
{
    /**
     * @desc   新增消费者
     * @author xl
     * @param $params
     * @return mixed
     */
    public function addConsumer($params)
    {
        return $this->post("/consumers/", [
            'json' => $params,
        ]);
    }

    /**
     * @desc   更新消费者
     * @author xl
     * @param $idOrName
     * @param $params
     * @return mixed
     */
    public function updateConsumer($idOrName, $params)
    {
        return $this->patch("/consumers/{$idOrName}", [
            'json' => $params,
        ]);
    }

    /**
     * @desc   获取消费者详情
     * @author xl
     * @param $idOrName
     * @return mixed
     */
    public function getConsumer($idOrName)
    {
        return $this->get("/consumers/{$idOrName}");
    }

    /**
     * @desc   消费者列表
     * @author xl
     * @param $params
     * @return mixed
     */
    public function consumers($params = [])
    {
        return $this->get('/consumers/', [
            'json' => $params,
        ]);
    }

    /**
     * @desc   删除消费者
     * @author xl
     * @param $idOrName
     * @return mixed
     */
    public function deleteConsumer($idOrName)
    {
        return $this->delete("/consumers/{$idOrName}");
    }
}