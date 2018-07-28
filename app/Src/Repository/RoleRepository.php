<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午4:49
 */

namespace App\Src\Repository;

use App\Core\Enums\ErrorCode;
use App\Exceptions\CodeException;
use App\Src\Models\Role;
use App\Support\Sys;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Redis;

class RoleRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * 缓存权限
     * @return bool
     */
    public function reloadRouters()
    {
        $roles = $this->all();
        /** @var Role $role */
        foreach ($roles ?? [] as $role) {
            $redisKey = sprintf(Sys::REDIS_KEY_ROLE_ROUTER_CACHE_KEY, $role->id);
            $routers = $role->routers->toArray();
            $routes = array_column($routers, 'route');
            if ($routes) {
                Redis::del($redisKey);
                Redis::sadd($redisKey, ...$routes);
            }
        }
        return true;
    }

    /**
     * 保存
     * @param $data
     * @return Role
     */
    public function save($data)
    {
        $id = array_get($data, 'id');
        $roleName = array_get($data, 'roleName');
        $roleDesc = array_get($data, 'roleDesc');
        $model = $this->findByField('id', $id)->first();
        if (!$model) {
            $model = new Role();
        }
        $model->role_name = $roleName;
        $model->role_desc = $roleDesc;
        $model->save();
        return $model;
    }

    /**
     * 详情
     * @param $data
     * @return mixed
     */
    public function getIdRole($data)
    {
        $id = array_get($data, 'id');
        return $this->findByField(['id' => $id])->first();
    }

    /**
     * 删除
     * @param $data
     * @return bool
     */
    public function del($data)
    {
        $id = array_get($data, 'id');
        $model = $this->findByField(['id' => $id])->first();
        if ($model) {
            $model->delete();
        }
        return true;
    }

    /**
     * 角色列表
     * @param $data
     * @return array
     */
    public function getLists($data)
    {
        $size = array_get($data, 'size') ?? 50;
        $model = $this->model;
        $routes = $model->paginate($size);
        $items = $routes->items();
        return [
            'total' => $routes->total(),
            'pageCount' => $routes->lastPage(),
            'items' => $items,
        ];
    }

    /**
     * @param $data
     * @return mixed
     */
    public function search($data)
    {
        $id = array_get($data, 'id');
        $searchText = array_get($data, 'searchText');
        $searchType = array_get($data, 'searchType');
        if ($searchType == Sys::ADMIN_ROUTER_SEARCH_TYPE_ALL) {
            $routeRepository = app(RoutesRepository::class);
            $routes = $routeRepository->getLists($data);
            return $routes;
        }
    }

    /**
     * @param $data
     * @return mixed
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function updateRouter($data)
    {
        $roleId = array_get($data, 'roleId');
        $routerId = array_get($data, 'routerId');
        $model = $this->findByField(['id' => $roleId])->first();
        if (!$model) {
            throw new CodeException(ErrorCode::$ENUM_ROLE_NOT_EXIST);
        }
        $routeRepository = app(RoutesRepository::class);
        $router = $routeRepository->info(['id' => $routerId]);

        if (!$router) {
            throw new CodeException(ErrorCode::$ENUM_ROUTER_NOT_EXIST);
        }

        $roleRouteRepository = app(RoleRouterRepository::class);
        $rel = $roleRouteRepository->getId($data);

        if ($rel) {
            return $rel->delete();
        }

        return $roleRouteRepository->save($data);
    }
}