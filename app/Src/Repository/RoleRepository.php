<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/26
 * Time: 下午4:49
 */

namespace App\Src\Repository;

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
            if ($routes){
                Redis::del($redisKey);
                Redis::sadd($redisKey, ...$routes);
            }
        }
        return true;
    }
}