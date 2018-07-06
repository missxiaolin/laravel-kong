<?php

namespace App\Src\Repository;

use App\Core\Enums\ErrorCode;
use App\Exceptions\CodeException;
use App\Src\Models\Users;
use Illuminate\Hashing\BcryptHasher;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class UsersRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Users::class;
    }

    /**
     * @param $data
     * @return Users
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function setUser($data)
    {
        $id = array_get($data, 'id');
        $mobile = array_get($data, 'mobile');
        $model = $this->findByField('id', $id)->first();
        if (!$model) {
            $this->getUserMobile($mobile);
            $model = new Users();
        }
        $model->name = array_get($data, 'name');
        $model->mobile = $mobile;
        $model->password = bcrypt(array_get($data, 'password'));
        $model->save();
        return $model;
    }

    /**
     * @param $mobile
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function getUserMobile($mobile)
    {
        $model = $this->findByField('mobile', $mobile)->first();
        if ($model) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_USER_MOBILE_ERROR);
        }
    }

    /**
     * @param $data
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function setToken($data)
    {
        $mobile = array_get($data, 'mobile');
        $password = array_get($data, 'password');
        $model = $this->findByField('mobile', $mobile)->first();
        if (!$model || !$this->checkPassword($password, $model->password)) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_USER_ERROR);
        }
        $model->token = generate_unique_id();
        $model->expires_at = time() + 3600;
        $model->save();
        return $model;
    }

    /**
     * 校验密码
     * @param $password
     * @param $pwd
     * @return bool
     */
    public function checkPassword($password, $pwd)
    {
        $hasher = new BcryptHasher();
        return $hasher->check($password, $pwd);
    }

    /**
     * 返回用户信息
     * @param $token
     * @return mixed
     */
    public function getInfoByToken($token)
    {
        $model = $this->findByField('token', $token)->first();
        return $model;
    }

    /**
     * 用户列表
     * @param $data array
     * @return array
     */
    public function getLists($data)
    {
        $mobile = array_get($data, 'mobile');
        $model = $this->model;
        if ($mobile) {
            $model = $model->where(['mobile' => $mobile]);
        }
        $user = $model->paginate(50);
        return [
            'total' => $user->total(),
            'pageCount' => $user->lastPage(),
            'items' => $user->items(),
        ];
    }

    /**
     * 禁用开启用户
     * @param $data
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function disable($data)
    {
        $id = array_get($data, 'id');
        $model = $this->findByField('id', $id)->first();
        if (!$model) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_USER_EXIST_ERROR);
        }
        $model->status = $model->status ? 0 : 1;
        $model->save();
        return $model;
    }
}