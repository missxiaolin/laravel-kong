<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午4:49
 */

namespace App\Src\Repository;

use App\Src\Models\RoleRouter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

class RoleRouterRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RoleRouter::class;
    }

    /**
     * 查询
     * @param $data
     * @return mixed
     */
    public function getId($data)
    {
        $roleId = array_get($data, 'roleId');
        $routerId = array_get($data, 'routerId');
        $model = $this->model->where(['role_id' => $roleId, 'router_id' => $routerId])->first();
        return $model;
    }

    /**
     * 保存
     * @param $data
     * @return bool
     */
    public function save($data)
    {
        $roleId = array_get($data, 'roleId');
        $routerId = array_get($data, 'routerId');
        $model = new RoleRouter();
        $model->role_id = $roleId;
        $model->router_id = $routerId;
        return $model->save();
    }
}