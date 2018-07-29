<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/29
 * Time: 下午5:00
 */

namespace App\Src\Repository;

use App\Src\Models\UsersRole;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

class UserRoleRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UsersRole::class;
    }

    /**
     * @param $data
     * @return bool
     */
    public function setData($data)
    {
        $userId = array_get($data, 'userId');
        $roleId = array_get($data, 'roleId');
        $model = $this->findByField(['role_id' => $roleId, 'user_id' => $userId])->first();
        if ($model) {
            return $model->delete();
        }
        $model = new UsersRole();
        $model->user_id = $userId;
        $model->role_id = $roleId;
        return $model->save();
    }
}