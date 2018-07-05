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
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function setToken($data)
    {
        $username = array_get($data, 'username');
        $password = array_get($data, 'password');
        $model = $this->findByField('name', $username)->first();
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
     * @return array
     */
    public function getLists()
    {
        $user = $this->paginate(50);
        return [
            'total' => $user->total(),
            'pageCount' => $user->lastPage(),
            'data' => $user->items(),
        ];
    }
}