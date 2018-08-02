<?php

namespace App\Src\Repository;

use App\Core\Enums\ErrorCode;
use App\Exceptions\CodeException;
use App\Src\Models\Users;
use App\Support\Sys;
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
        $model->expires_at = time() + 3600 * 24;
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
     * @param $data
     * @return mixed
     */
    public function getInfoId($data)
    {
        $id = array_get($data, 'id');
        $model = $this->findByField('id', $id)->first();
        return $model;
    }

    /**
     * 用户列表
     * @param $data array
     * @return array
     */
    public function getLists($data)
    {
        $size = array_get($data, 'size') ?? 50;
        $mobile = array_get($data, 'mobile');
        $status = array_get($data, 'status');
        $model = $this->model;
        if (isset($status)) {
            $model = $model->where(['status' => $status]);
        }
        if ($mobile) {
            $model = $model->where(['mobile' => $mobile]);
        }
        $create_start = array_get($data, 'create_start');
        $create_end = array_get($data, 'create_end');
        if ($create_start && $create_end) {
            $model = $model->whereBetween('created_at', [$create_start, $create_end]);
        }
        $user = $model->paginate($size);
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
        $model->status = $model->status ? Sys::USER_DISABLE : Sys::USER_NORMAL;
        $model->save();
        return $model;
    }

    /**
     * 获取角色
     * @param $data
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function getRoles($data)
    {
        $userId = array_get($data, 'userId');
        $user = $this->getInfoId(['id' => $userId]);
        if (!$user) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_NO_USER_ERROR);
        }
        $roles = $user->roles->toArray();
        $mine = array_column($roles, 'id');
        $roleRepository = app(RoleRepository::class);
        $roles = $roleRepository->getLists($data);

        foreach ($roles['items'] ?? [] as &$item) {
            $item->bound = in_array($item->id, $mine);
        }
        return $roles;
    }

    /**
     * @param $data
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function setRoles($data)
    {
        $userId = array_get($data, 'userId');
        $user = $this->getInfoId(['id' => $userId]);
        if (!$user) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_NO_USER_ERROR);
        }
        $userRoleRepository = app(UserRoleRepository::class);
        $res = $userRoleRepository->setData($data);
        return $res;
    }

    /**
     * @param $user
     * @return array
     */
    public function getPower($user)
    {
        $res = [];
        $response = app(RoutesRepository::class);
        if ($user->type == Sys::ADMIN_USER_SUPER_TYPE) {
            return $response->getUserPower();
        }
        $roles = $user->roles;
        $parents = [];
        $childrens = [];
        foreach ($roles ?? [] as $role) {
            // 父级
            $routers = $role->routers()->where('pid', 0)->get()->toArray();
            $parents = $this->dataFormat($parents, $routers);
            // 子集
            $routerChildrens = $role->routers()->where('pid', '>', 0)->get()->toArray();
            $childrens = $this->dataFormat($childrens, $routerChildrens);
        }
        $res = $this->duplicate($parents, $childrens);

        return $res;
    }

    /**
     * 获取按钮权限
     * @param $user
     * @param $data
     * @return array|mixed
     */
    public function getBtnPower($user, $data)
    {
        if (!$data) {
            return [];
        }
        if ($user->type == Sys::ADMIN_USER_SUPER_TYPE) {
            return $this->btnFormat($data);
        }
        $keys = array_keys($data);
        $routes = [];
        $roles = $user->roles;
        foreach ($roles ?? [] as $role) {
            $userRoutes = $role->routers()->whereIn('code', $keys)->get()->toArray();
            if (!$userRoutes) {
                continue;
            }
            array_map(function ($v) use (&$routes) {
                $routes[$v['id']] = $v['code'];
            }, $userRoutes);
        }
        foreach ($data as $k => $v) {
            if (in_array($k, $routes)) {
                $data[$k] = 1;
            }
        }
        return $data;
    }


    /**
     * @param $data
     * @return mixed
     */
    public function btnFormat($data)
    {
        foreach ($data as $k => $v) {
            $data[$k] = 1;
        }
        return $data;
    }

    /**
     * 格式化
     * @param $data
     * @param $routes
     * @return mixed
     */
    public function dataFormat($data, $routes)
    {
        if (!$routes) {
            return $data;
        }
        array_map(function ($v) use (&$data) {
            $data[$v['id']] = $v;
        }, $routes);
        return $data;
    }

    /**
     * 格式化
     * @param $parents
     * @param $childrens
     * @return array
     */
    public function duplicate($parents, $childrens)
    {
        foreach ($parents ?? [] as $k => $v) {
            $item = [];
            foreach ($childrens as $children) {
                if ($v['id'] == $children['level']) {
                    $item[] = $children;
                    $parents[$k]['children'] = $item;
                }
            }
        }
        return $parents;
    }
}