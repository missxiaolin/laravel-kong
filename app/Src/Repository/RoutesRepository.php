<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/7/27
 * Time: 下午2:15
 */

namespace App\Src\Repository;

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
        $model = $this->model;
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
}