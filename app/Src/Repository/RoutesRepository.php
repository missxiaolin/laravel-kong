<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午2:15
 */

namespace App\Src\Repository;

use App\Core\Enums\ErrorCode;
use App\Exceptions\CodeException;
use App\Src\Models\Routes;
use App\Support\Sys;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

class RoutesRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Routes::class;
    }

    /**
     * @param $data
     * @return array
     */
    public function getLists($data)
    {
        $size = array_get($data, 'size') ?? 50;
        $name = array_get($data, 'searchText');
        $model = $this->model;
        if ($name) {
            $model = $model->where('name', 'like', '%' . $name . '%');
        }
        $routes = $model->paginate($size);
        $items = $routes->items();
        foreach ($items as &$item) {
            $item->typeName = $this->getTypeName($item->type);
        }
        return [
            'total' => $routes->total(),
            'pageCount' => $routes->lastPage(),
            'items' => $items,
        ];
    }

    /**
     * 添加规则
     * @param $data
     * @return Routes
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function save($data)
    {
        $id = array_get($data, 'id');
        $code = array_get($data, 'code');
        if ($id) {
            $model = $this->model->where('code', $code)->where('id', '<>', $id)->first();
        } else {
            $model = $this->model->where('code', $code)->first();
        }
        // 判断code是否唯一
        if ($model) {
            throw new CodeException(ErrorCode::$ENUM_ROUTER_CODE_EXIST);
        }

        $pid = array_get($data, 'pid');
        $level = array_get($data, 'level');
        $name = array_get($data, 'name');
        $res_uri = array_get($data, 'res_uri');
        $icon = array_get($data, 'icon');
        $is_hidden = array_get($data, 'is_hidden');
        $noDropdown = array_get($data, 'noDropdown');
        $route = array_get($data, 'route');
        $type = array_get($data, 'type');
        $model = $this->findByField('id', $id)->first();
        if (!$model) {
            $model = new Routes();
        }
        $model->name = $name;
        $model->route = $route;
        $model->type = $type;
        $model->pid = $pid;
        $model->level = $level;
        $model->code = $code;
        $model->res_uri = $res_uri;
        $model->icon = $icon;
        $model->is_hidden = $is_hidden;
        $model->noDropdown = $noDropdown;
        $model->save();
        return $model;
    }

    /**
     * 详情
     * @param $data
     * @return mixed
     */
    public function info($data)
    {
        $id = array_get($data, 'id');
        return $this->findByField(['id' => $id])->first();
    }

    /**
     * @desc  获取管理员类型
     * @param $type
     * @return string
     */
    public function getTypeName($type)
    {
        if ($type === Sys::ADMIN_ROUTER_SYSTEM_TYPE) {
            return '系统路由';
        } elseif ($type === Sys::ADMIN_ROUTER_NORMAL_TYPE) {
            return '自定义路由';
        }
        return '未知';
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
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function search($data)
    {
        $id = array_get($data, 'id');
        $name = array_get($data, 'name');
        $pid = array_get($data, 'pid');
        $model = $this->model;
        if ($name) {
            $model = $model->where('name', $name);
        }
        if ($pid) {
            $model = $model->where('pid', $pid);
        }
        if ($id) {
            $model = $model->where('level', $id);
        }
        $model = $model->get();

        return $model;
    }

    /**
     * 获取权限路由
     * @return mixed
     */
    public function getUserPower()
    {
        $model = $this->model;
        $routes = $model->where('pid', 0)->get();
        foreach ($routes ?? [] as $route) {
            $route->children = $route->route()->get();
        }
        return $routes;
    }
}